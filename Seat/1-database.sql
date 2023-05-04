-- (A) SEATS
CREATE TABLE `seats` (
  `seat_id` varchar(16) NOT NULL,
  `room_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`,`room_id`);

-- (B) SESSIONS
CREATE TABLE `sessions` (
  `session_id` bigint(20) NOT NULL,
  `room_id` varchar(16) NOT NULL,
  `session_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `session_date` (`session_date`);

ALTER TABLE `sessions`
  MODIFY `session_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- (C) RESERVATIONS
CREATE TABLE `reservations` (
  `session_id` bigint(20) NOT NULL,
  `seat_id` varchar(16) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`session_id`,`seat_id`,`user_id`);

-- (D) DUMMY DATA
-- (D1) DUMMY SEATS
INSERT INTO `seats` (`seat_id`, `room_id`) VALUES
('A1', 'ROOM-A'),
('A2', 'ROOM-A'),
('A3', 'ROOM-A'),
('A4', 'ROOM-A'),
('B1', 'ROOM-A'),
('B2', 'ROOM-A'),
('B3', 'ROOM-A'),
('B4', 'ROOM-A'),
('C1', 'ROOM-A'),
('C2', 'ROOM-A'),
('C3', 'ROOM-A'),
('C4', 'ROOM-A');

-- (D2) DUMMY SESSION
INSERT INTO `sessions` (`session_id`, `room_id`, `session_date`) VALUES
(1, 'ROOM-A', '2077-06-05 08:00:00');

-- (D3) DUMMY RESERVATION
INSERT INTO `reservations` (`session_id`, `seat_id`, `user_id`) VALUES
('1', 'B2', '555'),
('1', 'A4', '888');