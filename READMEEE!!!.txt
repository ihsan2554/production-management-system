Production Management System (CodeIgniter)
Original system by mrezadit - see other systems at https://github.com/mrezadit
This system was created at 2022 for case studies and learning purposes
For the original system, you can contact mrezadit@gmail.com

Modified and extended by Ihsan Maulana (Universitas Pakuan)
Praktek Lapang case study at PT Konsulindo Informatika Perdana

// Login information
ADMIN (Full Access)
username : admin
password : admin

LEADER (Shift Head)
username : leader
password : leader

// Requirement
1. XAMPP
2. PHP (version 8.0.25, not tested with other version yet)

// HOW TO INSTALL
1. Copy and extract this folder to xampp/htdocs
2. Start Apache and MySQL in XAMPP
3. Create database with the name db_production in phpmyadmin
4. Import database file from /db/db_production.sql
5. Run this system in a browser (localhost/production-management-system-main), then input login information
6. Enjoy

Note: the dashboard (application/views/admin/Beranda.php) opens its own database connection, so update it as well if you change the database credentials.

// FEATURES
1. Dashboard - Summary of production progress & history, with production chart (target vs finished)
2. Customer - Customer data, add & update
3. Project - Customer requests for product quantity to be produced
4. Product - Product master data
5. Planning - Production plan from customer request projects, including shiftment, production date and target
6. Shiftment - Shiftment that works on the production process, including the Leader (Staff Head) with production date and target
7. Leader - Leader data (Staff Head) add & update
8. Production - The production process for each Shiftment, including production planning, the machines and materials used in the production process
9. Machine - Machine data, status, and history of machine used
10. Material - Material data, stock, and history of material used
11. Report - Production report, including sorting of production result (finished goods & waste), printable
12. Warehouse - Production progress from quantity request with total finished goods from completed production

// PRODUCTION WORKFLOW
1. Admin creates the project and production plan, then assigns it to a shiftment and leader
2. Leader clicks PROCESS, then records the machines and materials used
3. Once all machines are FINISHED and materials are filled, COMPLETE becomes available
4. Leader fills in the Production Sorting (finished goods & waste), and the status becomes Done
5. Results appear in Report, Warehouse, and the dashboard chart

// TECH STACK
1. PHP 8.0 and CodeIgniter 3.1.11 (MVC)
2. MariaDB / MySQL
3. Apache (XAMPP)
4. HTML, CSS, JavaScript, Chart.js

// MODIFICATIONS BY IHSAN MAULANA
1. Added the Product module and dashboard chart
2. Added COMPLETE button validation
3. Improved the Report feature
4. Updated the documentation