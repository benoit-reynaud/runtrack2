/* Pour récupérer le nom de l'étage ayant la salle avec la plus grande capacité,
 ainsi que le nom de cette salle et sa capacité :*/
SELECT etage.nom AS etage, salles.nom AS `Biggest Room`, salles.capacite
FROM salles
JOIN etage ON salles.id_etage = etage.id
WHERE salles.capacite = (SELECT MAX(capacite) FROM salles);