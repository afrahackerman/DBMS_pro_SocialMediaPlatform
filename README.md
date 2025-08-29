Project Title: Social Media Platform Database Management System
- **Course**: Database Management System Lab (CSE-2424)
- **Session**: Spring-2025
- **Semester**: 4th
- **Submitted By**: Tahasina Tasnim Afra (Student ID: C233456)
- **Instructor**: Ms. Mysha Sarin Kabisha, Assistant Lecturer, Dept. of CSE, IIUC
- **Submission Date**: July 13, 2025

# Overview
This repository contains the source code and documentation for a simplified social media platform DBMS, modeled after Instagram. The project applies DBMS concepts like ER modeling, normalization, and SQL querying to manage user data (profiles, posts, comments, likes, follows, replies). It uses Oracle 10g Express Edition as the backend, with a PHP-based web interface built using HTML, CSS, and XAMPP, connected via OCI8.

# Project Structure
- **Files**:
  - `social_media_dbms.sql`: Contains DDL (table creation) and DML (sample data, queries).
  - `index.php`: Web interface for inputting SQL queries.
  - `results.php`: Displays query results in an Instagram-themed table.
  - `screenshots/`: Folder for query output images (e.g., `query1_output.png`).
  - `README.md`: This file.
- **Folders**:
  - `css/`: CSS files for the Instagram-themed UI.
  - `docs/`: PDF report (C233456.pdf) and additional documentation.

# Setup Instructions
1. **Install Requirements**:
   - Oracle 10g Express Edition (XE).
   - XAMPP (for Apache and PHP).
   - Oracle Instant Client 19.26 (for OCI8 extension).
2. **Configure Environment**:
   - Set up Oracle XE with username `SYSTEM` and password `afra`.
   - Enable OCI8 in PHP by adding the extension in `php.ini`.
   - Place project files in `C:\xampp\htdocs\social_media_dbms`.
3. **Run the Project**:
   - Start XAMPP (Apache and MySQL).
   - Import `social_media_dbms.sql` into Oracle XE using SQL*Plus.
   - Access the web interface at `http://localhost/social_media_dbms/index.php`.

# Features
- **Database Design**: 3NF normalized schema with tables like `users`, `posts`, `comments`, `likes`, `follows`, `user_profile`, `reply`.
- **User Interface**: Instagram-themed design with gradient headers and colorful tables.
- **Queries**: Supports single-table, multi-table, and subquery operations (e.g., post counts, user followers).

# Usage
- Open `index.php` in a browser to input SQL queries.
- View results in `results.php`, with outputs saved as screenshots in the `screenshots` folder.
- Edit `social_media_dbms.sql` to add or modify data/queries.

# Challenges Faced
- Resolved foreign key errors by ordering table creation.
- Fixed PHP-Oracle connectivity with OCI8 configuration.
- Adjusted UI styling using CSS for consistency.

# Future Improvements
- Add user authentication.
- Implement real-time updates.
- Enhance query performance with indexing.

# Report
- Full details in `C233456.pdf` (33 pages), covering abstract, ERD, normalization, schema, UI, queries, challenges, and conclusion.
- References include textbook, Oracle docs, and a YouTube tutorial for PHP-Oracle setup.

# License
- This project is for academic use only. No commercial distribution.
