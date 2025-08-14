# ClusterCode_GovConnect
GovConnect is a one-stop digital platform that lets Sri Lankan citizens access, book, and track government services with a single NIC login—saving time, reducing queues, and cutting paperwork.


## Queries

### Required Data Queries
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


### Sample Data Queries

-- Insert Departments
INSERT INTO `department` (`id`, `department`) VALUES ('DEP0000001', 'Human Resources'), ('DEP0000002', 'Finance'), ('DEP0000003', 'IT'), ('DEP0000004', 'Marketing'), ('DEP0000005', 'Operations');

-- Insert Branches
INSERT INTO `branch` (`id`, `branch`, `department_id`) VALUES('BRN0000001', 'Recruitment Unit', 'DEP0000001'), ('BRN0000002', 'Training Center', 'DEP0000001'), ('BRN0000003', 'Payroll Office', 'DEP0000001'), ('BRN0000004', 'Employee Relations', 'DEP0000001'), ('BRN0000005', 'HR Compliance', 'DEP0000001'), ('BRN0000006', 'Accounts Payable', 'DEP0000002'), ('BRN0000007', 'Accounts Receivable', 'DEP0000002'), ('BRN0000008', 'Budgeting Office', 'DEP0000002'), ('BRN0000009', 'Treasury Division', 'DEP0000002'), ('BRN0000010', 'Audit Section', 'DEP0000002'), ('BRN0000011', 'Software Development', 'DEP0000003'), ('BRN0000012', 'Network Operations', 'DEP0000003'), ('BRN0000013', 'Cybersecurity Unit', 'DEP0000003'), ('BRN0000014', 'Database Management', 'DEP0000003'), ('BRN0000015', 'Help Desk Support', 'DEP0000003'), ('BRN0000016', 'Advertising Division', 'DEP0000004'), ('BRN0000017', 'Market Research', 'DEP0000004'), ('BRN0000018', 'Digital Campaigns', 'DEP0000004'), ('BRN0000019', 'Brand Management', 'DEP0000004'),
('BRN0000020', 'Events & Promotions', 'DEP0000004'), ('BRN0000021', 'Logistics', 'DEP0000005'), ('BRN0000022', 'Supply Chain', 'DEP0000005'), ('BRN0000023', 'Quality Control', 'DEP0000005'), ('BRN0000024', 'Production Unit', 'DEP0000005'), ('BRN0000025', 'Maintenance', 'DEP0000005');

-- Insert Government Services
INSERT INTO `service` (`id`, `title`, `description`, `branch_id`) VALUES ('SER0000001', 'Employee Registration', 'Register new government employees into the HR system.', 'BRN0000001'), ('SER0000002', 'Training Program Enrollment', 'Enroll employees into government training programs.', 'BRN0000002'), ('SER0000003', 'Salary Processing', 'Manage and process government employee salaries.', 'BRN0000003'), ('SER0000004', 'Disciplinary Hearings', 'Handle employee disciplinary cases and hearings.', 'BRN0000004'), ('SER0000005', 'Policy Compliance Checks', 'Ensure employees follow workplace rules and policies.', 'BRN0000005'), ('SER0000006', 'Tax Payment Service', 'Facilitate online and in-person tax payments.', 'BRN0000006'), ('SER0000007', 'Government Fund Allocation', 'Allocate funds to government departments and projects.', 'BRN0000007'), ('SER0000008', 'Budget Planning Assistance', 'Assist with creating annual budget reports.', 'BRN0000008'), ('SER0000009', 'Treasury Management', 'Oversee state treasury and cash flow.', 'BRN0000009'), ('SER0000010', 'Financial Auditing', 'Audit government institutions and agencies.', 'BRN0000010'), ('SER0000011', 'E-Government Portal Support', 'Provide technical support for online government services.', 'BRN0000011'), ('SER0000012', 'Network Security Monitoring', 'Monitor and secure government IT infrastructure.', 'BRN0000012'), ('SER0000013', 'Data Backup & Recovery', 'Manage backup and recovery of government data.', 'BRN0000013'), ('SER0000014', 'Database Maintenance', 'Maintain and optimize government databases.', 'BRN0000014'), ('SER0000015', 'Help Desk Assistance', 'Assist government employees with IT-related issues.', 'BRN0000015'), ('SER0000016', 'Public Awareness Campaigns', 'Plan and run campaigns to inform the public about government services.', 'BRN0000016'), ('SER0000017', 'Survey & Research', 'Conduct public opinion surveys for policy decisions.', 'BRN0000017'), ('SER0000018', 'Social Media Management', 'Manage government social media platforms.', 'BRN0000018'), ('SER0000019', 'Event Organization', 'Organize government-related public events.', 'BRN0000019'), ('SER0000020', 'Brand Promotion', 'Promote national branding initiatives.', 'BRN0000020'), ('SER0000021', 'Logistics Coordination', 'Coordinate transportation and deliveries for government projects.', 'BRN0000021'), ('SER0000022', 'Supply Chain Management', 'Manage supply chains for public sector resources.', 'BRN0000022'), ('SER0000023', 'Quality Inspection', 'Inspect and verify quality of public sector projects.', 'BRN0000023'), ('SER0000024', 'Production Planning', 'Plan and oversee production of government goods.', 'BRN0000024'), ('SER0000025', 'Equipment Maintenance', 'Maintain and repair government machinery and equipment.', 'BRN0000025');


## API Data Return Structure

{"status":"","data":[],"message":""} 

status - "success" or "fail"