/*Pour récupérer le nom des salles et le nom de leur étage :*/
SELECT salles.nom AS salle, etage.nom AS etage
FROM salles
JOIN etage ON salles.id_etage = etage.id;