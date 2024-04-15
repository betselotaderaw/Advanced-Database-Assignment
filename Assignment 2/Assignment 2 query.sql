CREATE TABLE `assets` (
  `AssetID` int NOT NULL,
  `Description` varchar(255) NOT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `Status` enum('In Warehouse','Checked Out') DEFAULT 'In Warehouse',
  PRIMARY KEY (`AssetID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `locations` (
  `LocationID` int NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Shelf` int NOT NULL,
  `Zone` char(1) NOT NULL,
  PRIMARY KEY (`LocationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `movements` (
  `MovementID` int NOT NULL AUTO_INCREMENT,
  `Timestamp` datetime NOT NULL,
  `AssetID` int NOT NULL,
  `FromLocationID` int NOT NULL,
  `ToLocationID` int NOT NULL,
  PRIMARY KEY (`MovementID`),
  KEY `AssetID` (`AssetID`),
  KEY `FromLocationID` (`FromLocationID`),
  KEY `ToLocationID` (`ToLocationID`),
  CONSTRAINT `movements_ibfk_1` FOREIGN KEY (`AssetID`) REFERENCES `assets` (`AssetID`),
  CONSTRAINT `movements_ibfk_2` FOREIGN KEY (`FromLocationID`) REFERENCES `locations` (`LocationID`),
  CONSTRAINT `movements_ibfk_3` FOREIGN KEY (`ToLocationID`) REFERENCES `locations` (`LocationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
