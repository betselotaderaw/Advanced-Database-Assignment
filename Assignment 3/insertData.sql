INSERT INTO Assets (AssetID, Description, PurchaseDate, Status)
VALUES 
    (1, 'Laptop', '2023-01-01', 'In Warehouse'),
    (2, 'Forklift', '2023-02-15', 'In Warehouse'),
    (3, 'Pallet Jack', '2023-03-10', 'In Warehouse'),
    (4, 'Handheld Scanner', '2023-04-20', 'In Warehouse'),
    (5, 'Desktop Computer', '2023-05-05', 'In Warehouse'),
    (6, 'Packing Machine', '2023-06-15', 'In Warehouse'),
    (7, 'Storage Rack', '2023-07-20', 'In Warehouse'),
    (8, 'Industrial Robot', '2023-08-10', 'In Warehouse'),
    (9, 'Electric Pallet Jack', '2023-09-25', 'In Warehouse'),
    (10, 'Conveyor Belt', '2023-10-30', 'In Warehouse');

INSERT INTO Locations (LocationID, Area, Shelf, Zone)
VALUES 
    (101, 'Receiving', 1, 'A'),
    (102, 'Storage', 2, 'B'),
    (103, 'Picking', 3, 'C'),
    (104, 'Shipping', 4, 'D');

INSERT INTO Movements (Timestamp, AssetID, FromLocationID, ToLocationID)
VALUES 
    ('2024-04-01 08:00:00', 1, 101, 102),
    ('2024-04-03 10:30:00', 2, 102, 103),
    ('2024-04-05 14:45:00', 3, 103, 104),
    ('2024-04-07 09:15:00', 4, 104, 101),
    ('2024-04-09 11:00:00', 1, 102, 101),
    ('2024-04-11 13:20:00', 2, 103, 102),
    ('2024-04-13 15:40:00', 3, 104, 103),
    ('2024-04-15 08:30:00', 4, 101, 104),
    ('2024-04-17 10:00:00', 5, 102, 103),
    ('2024-04-19 12:15:00', 6, 103, 104),
    ('2024-04-21 14:30:00', 7, 104, 101),
    ('2024-04-23 16:45:00', 8, 101, 102),
    ('2024-04-25 09:30:00', 9, 102, 103),
    ('2024-04-27 11:50:00', 10, 103, 104),
    ('2024-04-29 13:10:00', 1, 104, 101),
    ('2024-05-01 15:20:00', 2, 101, 102),
    ('2024-05-03 17:30:00', 3, 102, 103),
    ('2024-05-05 19:40:00', 4, 103, 104),
    ('2024-05-07 09:00:00', 5, 104, 101),
    ('2024-05-09 10:10:00', 6, 101, 102),
    ('2024-05-11 12:20:00', 7, 102, 103),
    ('2024-05-13 14:30:00', 8, 103, 104),
    ('2024-05-15 16:40:00', 9, 104, 101),
    ('2024-05-17 18:50:00', 10, 101, 102),
    ('2024-05-19 20:00:00', 1, 102, 103),
    ('2024-05-21 09:10:00', 2, 103, 104),
    ('2024-05-23 11:20:00', 3, 104, 101),
    ('2024-05-25 13:30:00', 4, 101, 102),
    ('2024-05-27 15:40:00', 5, 102, 103),
    ('2024-05-29 17:50:00', 6, 103, 104),
    ('2024-05-31 19:00:00', 7, 104, 101),
    ('2024-06-01 08:00:00', 8, 101, 102),
    ('2024-06-03 10:10:00', 9, 102, 103),
    ('2024-06-05 12:20:00', 10, 103, 104),
    ('2024-06-07 14:30:00', 1, 104, 101),
    ('2024-06-09 16:40:00', 2, 101, 102),
    ('2024-06-11 18:50:00', 3, 102, 103),
    ('2024-06-13 20:00:00', 4, 103, 104);

INSERT INTO Assets (AssetID, Description, PurchaseDate, Status)
VALUES 
    (21, 'Tablet', '2023-01-01', 'Checked Out'),
    (22, 'Crane', '2023-02-15', 'Checked Out'),
    (23, 'Cart', '2023-03-10', 'Checked Out'),
    (24, 'Barcode Scanner', '2023-04-20', 'Checked Out'),
    (25, 'Server', '2023-05-05', 'Checked Out'),
    (26, 'Wrapping Machine', '2023-06-15', 'Checked Out'),
    (27, 'Shelving Unit', '2023-07-20', 'Checked Out'),
    (28, 'Drone', '2023-08-10', 'Checked Out'),
    (29, 'Tow Tractor', '2023-09-25', 'Checked Out'),
    (30, 'Assembly Line', '2023-10-30', 'Checked Out');

INSERT INTO Movements (Timestamp, AssetID, FromLocationID, ToLocationID)
VALUES 
    ('2024-06-15 08:00:00', 21, 101, 102),
    ('2024-06-17 10:30:00', 22, 102, 103),
    ('2024-06-19 14:45:00', 23, 103, 104),
    ('2024-06-21 09:15:00', 24, 104, 101),
    ('2024-06-23 11:00:00', 25, 102, 101),
    ('2024-06-25 13:20:00', 26, 103, 102),
    ('2024-06-27 15:40:00', 27, 104, 103),
    ('2024-06-29 08:30:00', 28, 101, 104),
    ('2024-07-01 10:00:00', 29, 102, 103),
    ('2024-07-03 12:15:00', 30, 103, 104);