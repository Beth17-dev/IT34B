CREATE TABLE  user_sessions(
    -- Session id tpo be used in dashboard and references
    session_id INT AUTO_INCREMENT PRIMARY KEY,

    -- User ID reference
    user_id INT NOT NULL,

    -- Session Attributes
    session_start DATETIME NOT NULL,
    session_end DATETIME NOT NULL,
    session_duration INT DEFAULT NULL,

    -- Constraints and Foreign Key Implemetation
    CONSTRAINT fk_user_sessions_user_id
     FOREIGN KEY (user_id) 
     REFERENCES users(user_id)
     ON DELETE CASCADE
     ON UPDATE CASCADE

);