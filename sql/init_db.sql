# создаем БД для мока
CREATE DATABASE IF NOT EXISTS task_manager;

CREATE TABLE IF NOT EXISTS task_manager.tasks (
	            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	            name_user VARCHAR(32),
                email VARCHAR(32),
	            text TEXT,
	            flag_done INT(1) DEFAULT 0,
	            changed INT(1) DEFAULT 0,
	            );

CREATE TABLE IF NOT EXISTS task_manager.login (
	            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	            login VARCHAR(32),
                pass VARCHAR(64),
                admin INT(1) DEFAULT 0
	            );