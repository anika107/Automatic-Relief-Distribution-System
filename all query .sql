//active case
SELECT COUNT(*)
FROM affected WHERE status = 'affected';

//recoverd case
SELECT COUNT(*)
FROM affected WHERE status = 'recovered';

//total dead
SELECT COUNT(*)
FROM affected WHERE status = 'dead';

//critical case
SELECT COUNT(*)
FROM affected WHERE status = 'critical';

//new case
DECLARE @today date = GETDATE();
SELECT COUNT(*)
FROM affected WHERE detection_date >= @today AND 
detection_date <  DATEADD(DAY, 1, @today) AND status = 'affected';

//new dead
DECLARE @today date = GETDATE();
SELECT COUNT(*)
FROM affected WHERE detection_date >= @today AND 
detection_date <  DATEADD(DAY, 1, @today) AND status = 'dead';