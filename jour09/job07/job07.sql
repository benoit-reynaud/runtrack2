/*l'ensemble des informations des étudiants qui ont plus de 18 ans :*/
SELECT * FROM etudiants WHERE DATEDIFF(CURDATE(), naissance) >= 6570;
/* 6570 correspond approximativement à 18 ans (365 jours par an multiplié par 18)*/