# ClusterCode_GovConnect
GovConnect is a one-stop digital platform that lets Sri Lankan citizens access, book, and track government services with a single NIC login—saving time, reducing queues, and cutting paperwork.


## Queries
INSERT INTO `gov_connect`.`user_role` (`id`, `role`) VALUES (1, 'Government Officer');
INSERT INTO `gov_connect`.`user_role` (`id`, `role`) VALUES (2, 'Citizen');

INSERT INTO `gov_connect`.`user_status` (`id`, `status`) VALUES (1, 'Active');
INSERT INTO `gov_connect`.`user_status` (`id`, `status`) VALUES (2, 'Deactive');

INSERT INTO `time_slot` (`id`, `start_time`, `end_time`) VALUES (1, '09:00:00', '09:20:00'), (2, '09:20:00', '09:40:00'), (3, '09:40:00', '10:00:00'), (4, '10:00:00', '10:20:00'), (5, '10:20:00', '10:40:00'), (6, '10:40:00', '11:00:00'), (7, '11:00:00', '11:20:00'), (8, '11:20:00', '11:40:00'), (9, '11:40:00', '12:00:00'), (10, '13:00:00', '13:20:00'), (11, '13:20:00', '13:40:00'), (12, '13:40:00', '14:00:00'), (13, '14:00:00', '14:20:00'), (14, '14:20:00', '14:40:00'), (15, '14:40:00', '15:00:00'), (16, '15:00:00', '15:20:00'), (17, '15:20:00', '15:40:00'), (18, '15:40:00', '16:00:00');

INSERT INTO `gov_connect`.`document_type` (`id`, `type`) VALUES (1, 'pdf');
INSERT INTO `gov_connect`.`document_type` (`id`, `type`) VALUES (2, 'image');

INSERT INTO `gov_connect`.`appointment_status` (`id`, `status`) VALUES (1, 'Pending');
INSERT INTO `gov_connect`.`appointment_status` (`id`, `status`) VALUES (2, 'Accepted');
INSERT INTO `gov_connect`.`appointment_status` (`id`, `status`) VALUES (3, 'Rejected');
INSERT INTO `gov_connect`.`appointment_status` (`id`, `status`) VALUES (4, 'Completed');