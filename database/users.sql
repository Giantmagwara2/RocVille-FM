CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  verification_token VARCHAR(64),  -- For email verification
  is_verified BOOLEAN DEFAULT 0,    -- 0 = not verified, 1 = verified
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
