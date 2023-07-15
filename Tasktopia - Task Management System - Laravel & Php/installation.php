<?php


$conn = mysqli_connect('localhost', 'root', '');


// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}


// Create database

$sql = "CREATE DATABASE laravel";

if (mysqli_query($conn, $sql)) {

    echo "Database created successfully";

} else {

    echo "Error creating database: " . mysqli_error($conn);

}


// Close connection

mysqli_close($conn);


// Step 1: Establish a database connection that you created 

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "laravel";


$conn = mysqli_connect($servername, $username, $password, $dbname);


// Step 2: Write the SQL queries (can write all the queries by exporting them from php my admin )

$sql = "CREATE TABLE failed_jobs (
  id bigint(20) UNSIGNED NOT NULL,
  uuid varchar(255) NOT NULL,
  connection text NOT NULL,
  queue text NOT NULL,
  payload longtext NOT NULL,
  exception longtext NOT NULL,
  failed_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL,
  migration varchar(255) NOT NULL,
  batch int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations (id, migration, batch) VALUES
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_04_12_212334_users', 2),
(14, '2023_04_12_212410_projects', 3);

CREATE TABLE password_reset_tokens (
  email varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  created_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE personal_access_token` (
  id bigint(20) UNSIGNED NOT NULL,
  tokenable_type varchar(255) NOT NULL,
  tokenable_id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) NOT NULL,
  token varchar(64) NOT NULL,
  abilities text DEFAULT NULL,
  last_used_at timestamp NULL DEFAULT NULL,
  expires_at timestamp NULL DEFAULT NULL,
  created_at imestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE projects (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(200) NOT NULL,
  description text NOT NULL,
  status tinyint(4) NOT NULL,
  start_date date NOT NULL,
  end_date date NOT NULL,
  manager_id int(11) NOT NULL,
  user_ids text NOT NULL,
  date_created timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO projects (id, name, description, status, start_date, end_date, manager_id, user_ids, date_created) VALUES
(6, 'All Girls Code', 'Newsletter Preparation', 5, '2023-04-25', '2023-04-30', 27, '', '2023-04-18 10:01:47'),
(21, 'I3302 Project', 'Develop a task management system using laravel and php', 5, '2023-04-01', '2023-04-13', 27, '', '2023-04-18 14:42:33'),
(22, 'Centremine', 'Upload at least 5 vacancies per week', 3, '2023-04-01', '2023-04-19', 27, '', '2023-04-18 14:50:23'),
(23, 'laravel project', 'task managment system amazing project', 5, '2023-04-07', '2023-04-28', 27, '', '2023-04-18 14:56:18'),
(25, 'Chess Game', 'Hello', 3, '2023-04-06', '2023-04-20', 27, '', '2023-04-18 15:28:01');

CREATE TABLE users (
  id bigint(20) UNSIGNED NOT NULL,
  name varchar(255) DEFAULT NULL,
  firstname varchar(255) DEFAULT NULL,
  lastname varchar(255) DEFAULT NULL,
  email varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  type tinyint(4) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  avatar text NOT NULL DEFAULT 'no-image-available.png',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO users (id, name, firstname, lastname, email, email_verified_at, password, remember_token, type, avatar, created_at, updated_at) VALUES
(23, NULL, 'Nagham', 'Fakheraldine', 'naghamfakheraldine2002@gmail.com', NULL, '$2y$10$tK8aYhyrCjexCD.Z5GKL7e4.VsltfDh/FYgYdVqjYy6iBlQ8WUlva', NULL, 1, 'no-image-available.png', '2023-04-18 13:07:58', '2023-04-18 15:08:18'),
(26, NULL, 'Issa', 'Farhat', 'issa@gmail.com', NULL, '$2y$10$uPZCwrpqlyuR2QjShfodI.Lr5HaGBkh9LWpkd9dltfaQ4Qpjhw/2i', NULL, 2, 'no-image-available.png', '2023-04-18 15:35:04', '2023-04-18 19:53:11'),
(27, NULL, 'Sally', 'Harfouch', 'sally@gmail.com', NULL, '$2y$10$OaN0In6f3FCv0lx6lVZ.du3v/sE4ZzglT0d0NmEc88QcxsyX/ph2i', NULL, 2, 'no-image-available.png', '2023-04-18 15:56:14', '2023-04-18 15:56:14'),
(31, NULL, 'hanin', 'khalid', 'hanin@gmail.com', NULL, '$2y$10$AwqOm08jJlqXQDk6phCdo.MutPjWMN0SULqY6tymYYSrVcaBGFUgW', NULL, 2, 'no-image-available.png', '2023-04-18 19:26:34', '2023-04-18 19:26:34'),
(34, NULL, 'Nagham', 'Zahreddine', 'naghamZhr@gmail.com', NULL, '$2y$10$T4/oJElzsUsRzA5RDAvR5O5SGUTO3.wV0WcXHBMf9CqVgLZ8vFEIO', NULL, 2, 'no-image-available.png', '2023-04-18 19:52:10', '2023-04-18 19:52:10');

ALTER TABLE failed_jobs
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY failed_jobs_uuid_unique (uuid);

ALTER TABLE migrations
  ADD PRIMARY KEY (id);

ALTER TABLE password_reset_tokens
  ADD PRIMARY KEY (email);

ALTER TABLE personal_access_tokens
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY personal_access_tokens_token_unique (token),
  ADD KEY personal_access_tokens_tokenable_type_tokenable_id_index
(tokenable_type,tokenable_id);

ALTER TABLE projects
  ADD PRIMARY KEY (id);

ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY users_email_unique (email);

ALTER TABLE failed_jobs
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE migrations
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE personal_access_tokens
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE projects
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE users
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
";



// Step 3: Call mysqli_multi_query function

if (mysqli_multi_query($conn, $sql)) {

    // If successful

    echo "Tables created and data inserted successfully.";

} else {

    // If error

    echo "Error: " . mysqli_error($conn);

}


// Step 4: Close the database connection

mysqli_close($conn);

?>