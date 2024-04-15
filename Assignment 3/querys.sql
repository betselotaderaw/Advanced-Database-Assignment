--
SELECT m.AssetID, m.Timestamp, m.ToLocationID
FROM (
    SELECT AssetID, MAX(Timestamp) AS max_date
    FROM movements
    GROUP BY AssetID
) AS recent_dates
JOIN movements AS m 
    ON recent_dates.AssetID = m.AssetID AND recent_dates.max_date = m.Timestamp
Join assets a
on a.AssetID = m.AssetID and a.Status = 'In Warehouse';

--
SELECT count(*) as TotalAssetInWarehouse
 FROM tsw.assets where Status = 'In Warehouse';

--
select a.assetId,Description,m.Timestamp,FromLocationID,ToLocationID,Status from movements m
inner join assets a
on a.AssetID = m.AssetID
and a.AssetID = 1;
