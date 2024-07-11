-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2024 at 01:23 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdbscsha_bsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, '1234', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`id`, `image`, `name`, `description`, `status`) VALUES
(10, 'food_item415979_images (7).jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(11, 'food_item415198_images (6).jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(12, 'food_item495804_images (5).jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(13, 'food_item349862_images (4).jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(14, 'food_item642597_images (3).jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(15, 'food_item597928_images (2).jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(16, 'food_item538837_images (1).jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(17, 'food_item450329_download.jpg', 'Course', 'A course usually covers an individual subject. Courses generally have a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course. Courses can either be compulsory material or \"elective\".', 'active'),
(18, 'cyber-security-services01.png', 'Cyber Security Training Course', 'yber Security & Ethical Hacking\r\nEmbark into the dynamic world of Cybersecurity and Ethical Hacking, where every click is a step toward digital mastery. Dive into practical labs, simulations, and real-world experiences that mirror the challenges of the ever-evolving Cybersecurity and Ethical Hacking landscape.\r\nKey Highlights\r\n\r\nImmersive Ethical Hacking Course with Classroom Experience\r\n\r\n\r\nHands-on Training By Industry Experts\r\n\r\n\r\nLive Hacking Demonstrations\r\n\r\n\r\nEthical Hacking Course Challenges\r\n\r\n\r\nRed Team vs. Blue Team Simulations\r\n\r\n\r\nExclusive Job Opportunities Portal', 'active'),
(19, 'food_item473880_download (4).png', 'Redhat Taining', 'Become Red Hat\r\nCertified with Live\r\nClassroom and Online\r\nTraining.\r\n\r\nRHCSA CERTIFICATION\r\nCandidate would earn the certificate of Red Hat Certified System Administrator EX200 (RHCSA). Every candidate has it’s own unique certification id and number which is globally accredited.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Gallery`
--

CREATE TABLE `Gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Gallery`
--

INSERT INTO `Gallery` (`id`, `image`) VALUES
(4, 'WhatsApp Image 2024-02-12 at 12.01.15 PM.jpeg'),
(5, 'Midhun Krishnan (1).png'),
(6, 'WhatsApp Image 2024-05-08 at 1.22.55 PM.jpeg'),
(7, 'WhatsApp Image 2024-01-06 at 1.53.27 PM.jpeg'),
(8, 'WhatsApp Image 2023-10-21 at 11.45.59 AM.jpeg'),
(9, 'WhatsApp Image 2024-06-28 at 1.56.34 PM.jpeg'),
(10, 'Brown Beige Elegant Minimalist Aesthetic Moodboard.png'),
(11, 'Pearson+Vue+Logo.jpg'),
(12, 'WhatsApp Image 2023-10-21 at 11.45.58 AM (1).jpeg'),
(13, 'service_images736715_WhatsApp Image 2024-05-27 at 8.38.39 PM.jpeg'),
(14, 'service_images517236_WhatsApp Image 2023-09-27 at 3.51.32 PM (2).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `id` int(11) NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Service`
--

INSERT INTO `Service` (`id`, `image`, `name`, `description`, `status`) VALUES
(23, 'service_images965434_c..jpg', 'Cyber Security', 'Cybersecurity is essential in protecting against digital threats like malware and phishing. It involves practices like using strong passwords, updating software, encrypting data, and training employees to safeguard sensitive information. As technology use grows, robust cybersecurity measures are crucial for ensuring data security and business continuity', 'active'),
(24, 'service_images365647_d..jpg', 'Data Center Security', 'Data center security is vital for protecting sensitive information through physical measures like access controls and surveillance, along with digital protections such as firewalls, encryption, and regular audits. These combined efforts ensure data integrity and prevent unauthorized access and cyber attacks.', 'active'),
(25, 'service_images111674_da..jpg', 'Data Identity Management', 'Data identity management is essential for ensuring that only authorized individuals have access to sensitive information. It involves the use of technologies and processes to verify user identities, manage access permissions, and monitor user activity. Key components include multi-factor authentication, single sign-on, and role-based access control, which help prevent unauthorized access and data breaches. By effectively managing data identities, organizations can enhance security, maintain compliance with regulatory standards, and protect against identity theft and fraud', 'active'),
(26, 'service_images259346_cl..jpg', 'Cloud Security', 'Cloud security refers to the measures and practices designed to protect data, applications, and infrastructure hosted in cloud environments. It encompasses a range of technologies, policies, and controls that work together to safeguard cloud-based assets from unauthorized access, data breaches, and other cyber threats. Key aspects of cloud security include encryption, identity and access management (IAM), network security, and regular security audits and monitoring. By adopting robust cloud security measures, organizations can ensure the confidentiality, integrity, and availability of their data and applications while leveraging the scalability and flexibility benefits of cloud computing', 'active'),
(27, 'service_images494144_em..jpg', 'Endpoint and Email Security', 'Endpoint and email security are critical components of a comprehensive cybersecurity strategy, focusing on protecting devices like computers, mobile devices, and email systems from cyber threats. Endpoint security involves deploying antivirus software, firewalls, and intrusion detection systems to safeguard individual devices against malware, unauthorized access, and data breaches. Email security, on the other hand, includes measures such as spam filters, email encryption, and phishing detection to prevent malicious emails from compromising sensitive information or installing malware. By implementing robust endpoint and email security measures, organizations can mitigate risks, protect sensitive data, and ensure the secure operation of their digital infrastructure.', 'active'),
(28, 'service_images400894_en..jpg', 'Enterprise Networking', 'Enterprise networking involves the infrastructure and systems that enable efficient communication and resource sharing within large organizations. It includes networks like LANs, WANs, VPNs, and wireless networks, managed through protocols and security measures. This setup supports collaboration, resource accessibility, and scalable growth, with robust security ensuring data integrity and protection against cyber threats', 'active'),
(29, 'service_images115407_data..jpg', 'Data Center Networking', 'Data center networking manages the infrastructure that connects servers and storage devices, enabling efficient data exchange within the facility. It utilizes high-speed equipment like switches and routers to ensure fast and secure communication, supporting the reliability and scalability of data center operations while implementing robust security measures to safeguard sensitive information.', 'active'),
(30, 'service_images241742_Wifi..jpg', 'Wi-Fi Solutions', 'Wi-Fi solutions provide wireless connectivity through access points, enabling devices like laptops and smartphones to connect without cables. They emphasize deployment for coverage, security with WPA3, and management for performance monitoring and policy enforcement. Scalable and integral to modern connectivity needs, Wi-Fi solutions support seamless digital interactions across various environments.', 'active'),
(31, 'service_images691871_sd..jpg', 'SD-WANs', 'SD-WANs (Software-Defined Wide Area Networks) streamline network management by centrally controlling and optimizing data traffic across diverse network connections like MPLS and broadband. They enhance agility, prioritize critical applications, and reduce costs by dynamically adjusting traffic routes based on real-time conditions. With integrated security and centralized management, SD-WANs enable enterprises to efficiently manage wide area networks, ensuring reliable connectivity and performance for distributed workforces and cloud applications.', 'active'),
(32, 'service_images978443_cm..jpg', 'Campus & Branch Networking', 'Campus and branch networking involves creating and managing local area networks (LANs) across multiple sites such as campuses, branch offices, and remote locations. These networks facilitate seamless communication, data sharing, and access to centralized resources within organizations. Key elements include designing scalable network architectures, ensuring reliable connectivity through technologies like Ethernet and VPNs, implementing robust security measures, and employing effective network management tools to optimize performance and support business operations across distributed environments.', 'active'),
(33, 'service_images786342_images.png', 'Cloud', '\r\nAdvisory & Optimization\r\nImplementation & Migration\r\nManagement & Automation\r\nSecurity & Governance', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Gallery`
--
ALTER TABLE `Gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Course`
--
ALTER TABLE `Course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Gallery`
--
ALTER TABLE `Gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
