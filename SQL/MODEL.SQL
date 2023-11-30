INSERT INTO modelevoyage(IDTYPEVOYAGE, NOM, DESCRIPTION, DESTINATION, TOUROPERATOR) 
VALUES ("2", "Allemagne", "Au cœur de Berlin - Un hôtel moderne - Des chambres confortables", "Berlin", "SalaünHolidaysTO"),
("3", "France", "Amateurs d'authenticité, laissez-vous tenter par ce séjour de 5 jours en Alsace.", "Alsace", "HolidaysTO"),
("1", "Bresil", "La Baie de Rio - Découverte de la flore et de la faune amazoniennes - Le charme colonial de Salvador de Bahia - Brasilia, la ville de tous les possibles.", "Rio", "TOHolidays");

INSERT INTO voyage(IDMODELEVOYAGE, DATEDEPART)
VALUES ("9", "2024-02-23"),
("9", "2024-04-13"),
("7", "2024-04-12"),
("7", "2024-03-03"),
("8", "2024-07-10"),
("8", "2024-11-20");

INSERT INTO client(NOM, PRENOM, ADRESSE, EMAIL, TEL)
VALUES ("BERTRAND", "Pauline", "", "pauline.bertrand.461@gmail.com", "0752415475"),
("BLANDIN", "Ilann", "", "iblandin@gmail.com", "0685241547"),
("BLEE", "Leny", "rue du chateau", "lblee@gmail.com", "0685958474");


INSERT INTO avis(POINTSPOSITIFS, POINTSNEGATIFS, DATEAVIS)
VALUES ("Très bonne destination, à conseiller !", "Quelques bruits la nuit dans l'hotel", "2024-02-26"),
("De très beaux paysages", "Enormément de moustiques", "2024-07-15"),
("De très bonnes rencontres", "Beaucoup de population dans les villes, un peu trop", "2024-03-13"),
("Incroyable voyage", "", "2024-04-17"),
("", "", "2024-04-15"),
("J'ai adoré", "", "2024-12-03");

INSERT INTO reservation(IDRESERVATION, IDVOYAGE, IDCLIENT, IDAVIS)
VALUES ("14050", "5", "9", "22"),
("21040", "6", "8", "19"),
("11047", "14", "7", "18"),
("14574", "13", "9", "20"),
("45023", "11", "8", "21"),
("78954", "12", "7", "17");

INSERT INTO `posseder` (`IDPRESTATION`, `IDMODELEVOYAGE`) VALUES
(1, 7),
(2, 7),
(2, 8),
(2, 9),
(3, 7),
(3, 8),
(3, 9),
(4, 7),
(4, 8),
(5, 8),
(6, 7),
(6, 9),
(7, 7),
(8, 8),
(10, 9);

INSERT INTO `note` (`IDPRESTATION`, `IDAVIS`, `NOTE`) VALUES
(3, 26, '2'),
(4, 26, '3'),
(6, 26, '2'),
(7, 26, '3'),
(1, 25, '2'),
(2, 25, '2'),
(3, 25, '2'),
(4, 25, '1'),
(6, 25, '3'),
(7, 25, '3'),
(10, 24, '1'),
(2, 24, '3'),
(3, 24, '2'),
(6, 24, '3'),
(10, 23, '3'),
(2, 23, '1'),
(3, 23, '3'),
(6, 23, '2'),
(2, 26, '1'),
(1, 26, '2'),
(5, 27, '3'),
(2, 27, '2'),
(8, 27, '2'),
(4, 27, '1'),
(3, 27, '3'),
(5, 28, '3'),
(2, 28, '3'),
(8, 28, '2'),
(4, 28, '1'),
(3, 28, '1');