CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password_hash) VALUES ('admin', '$2y$10$hC3xcbBbQvfVlptyZ7oCQ.7S8E2YpVI1OdfjAkRpOJj7e3yWLekBm');

DELIMITER //

CREATE PROCEDURE InsertMovement(
    IN p_assetID INT,
    IN p_fromLocationID INT,
    IN p_toLocationID INT
)
BEGIN
    INSERT INTO Movements (Timestamp,AssetID, FromLocationID, ToLocationID)
    VALUES (CURRENT_TIMESTAMP,p_assetID, p_fromLocationID, p_toLocationID);
END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE InsertLocation(
    IN p_area VARCHAR(50),
    IN p_shelf INT,
    IN p_zone CHAR(1)
)
BEGIN
    INSERT INTO Locations (Area, Shelf, Zone)
    VALUES (p_area, p_shelf, p_zone);
END//

DELIMITER ;

DELIMITER //

CREATE PROCEDURE InsertAsset(
    IN p_description VARCHAR(255),
    IN p_date DATE,
    IN p_status ENUM('In Warehouse', 'Checked Out')
)
BEGIN
    INSERT INTO Assets (Description, PurchaseDate, Status)
    VALUES (p_description, p_date, p_status);
END//

DELIMITER ;

