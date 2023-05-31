<!DOCTYPE html>
<html>
<head>
    <title>Jeu du Morpion</title>
    <style>
        table {
            border-collapse: collapse;
        }
        
        td {
            width: 50px;
            height: 50px;
            text-align: center;
            border: 1px solid black;
        }
        
        .winner {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Jeu du Morpion</h1>
    
    <?php
    session_start();
    
    // Initialisation de la grille
    if (!isset($_SESSION['grille'])) {
        $_SESSION['grille'] = [
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ];
    }
    
    // Vérifier si un joueur a cliqué sur une case
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['case'])) {
        $ligne = $_POST['ligne'];
        $colonne = $_POST['colonne'];
        $joueur = $_POST['joueur'];
        
        // Mettre à jour l'état de la case cliquée
        if ($_SESSION['grille'][$ligne][$colonne] === '') {
            $_SESSION['grille'][$ligne][$colonne] = $joueur;
            
            // Laisser l'ordinateur jouer
            $ordinateurJoue = false;
            while (!$ordinateurJoue) {
                $randomLigne = rand(0, 2);
                $randomColonne = rand(0, 2);
                
                if ($_SESSION['grille'][$randomLigne][$randomColonne] === '') {
                    $_SESSION['grille'][$randomLigne][$randomColonne] = 'O';
                    $ordinateurJoue = true;
                }
            }
        }
    }
    
    // Vérifier s'il y a un gagnant
    function verifierGagnant($grille, $symbole) {
        // Vérifier les lignes
        for ($i = 0; $i < 3; $i++) {
            if ($grille[$i][0] === $symbole && $grille[$i][1] === $symbole && $grille[$i][2] === $symbole) {
                return true;
            }
        }
        
        // Vérifier les colonnes
        for ($j = 0; $j < 3; $j++) {
            if ($grille[0][$j] === $symbole && $grille[1][$j] === $symbole && $grille[2][$j] === $symbole) {
                return true;
            }
        }
        
        // Vérifier les diagonales
        if ($grille[0][0] === $symbole && $grille[1][1] === $symbole && $grille[2][2] === $symbole) {
            return true;
        }
        if ($grille[0][2] === $symbole && $grille[1][1] === $symbole && $grille[2][0] === $symbole) {
            return true;
        }
        
        return false;
    }
    
    // Vérifier s'il y a un match nul
    function verifierMatchNul($grille) {
        foreach ($grille as $ligne) {
            if (in_array('', $ligne)) {
                return false;
            }
        }
        return true;
    }
    
    // Réinitialiser la partie
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reinitialiser'])) {
        $_SESSION['grille'] = [
            ['', '', ''],
            ['', '', ''],
            ['', '', '']
        ];
    }
    
    // Vérifier si un joueur a gagné ou s'il y a un match nul
    $gagnant = '';
    if (verifierGagnant($_SESSION['grille'], 'X')) {
        $gagnant = 'X';
    } elseif (verifierGagnant($_SESSION['grille'], 'O')) {
        $gagnant = 'O';
    } elseif (verifierMatchNul($_SESSION['grille'])) {
        $gagnant = 'Match nul';
    }
    ?>
    
    <?php if ($gagnant === ''): ?>
        <table>
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td <?php if ($_SESSION['grille'][$i][$j] !== '') echo 'class="winner"'; ?>>
                            <?php if ($_SESSION['grille'][$i][$j] === ''): ?>
                                <form method="post">
                                    <input type="hidden" name="ligne" value="<?php echo $i; ?>">
                                    <input type="hidden" name="colonne" value="<?php echo $j; ?>">
                                    <input type="hidden" name="joueur" value="X">
                                    <button type="submit" name="case" value="X">-</button>
                                </form>
                            <?php else: ?>
                                <?php echo $_SESSION['grille'][$i][$j]; ?>
                            <?php endif; ?>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        
        <form method="post">
            <button type="submit" name="reinitialiser">Réinitialiser la partie</button>
        </form>
    <?php else: ?>
        <h2><?php echo $gagnant; ?> a gagné !</h2>
        
        <form method="post">
            <button type="submit" name="reinitialiser">Réinitialiser la partie</button>
        </form>
    <?php endif; ?>
    
</body>
</html>

