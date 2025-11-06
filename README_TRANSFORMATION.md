ARDHU CONNECT - Transformation from AHN CONNECT
================================================

This package is a transformed version of the original AHN CONNECT project adapted for ARDHU (Action pour le Respect des Droits de l’Homme et la Dignité Humaine).

What I changed / added:
- Replaced site title occurrences "AHN CONNECT" -> "ARDHU CONNECT".
- Updated CSS palette to ARDHU colors.
- Added new pages: signalement.php and signalement_submit.php for reporting cases.
- Added migration_sql.sql containing new tables (utilisateurs, signalements, soutiens_psychosociaux, notifications).
- Added README with instructions.

How to use:
1. Place the project in your webserver root.
2. Edit db.php with your database credentials.
3. Import migration_sql.sql into your MySQL database (or edit to fit your schema).
4. Ensure folders 'uploads' and 'uploads/preuves' are writable by the web server.
5. Test signalement form after logging in.

Security notes:
- Replace direct DB credentials with placeholders or use environment variables.
- Verify uploaded files for malicious content before moving to production.

