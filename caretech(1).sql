-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2013 at 10:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caretech`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(50) NOT NULL,
  `About` text NOT NULL,
  `Title` text NOT NULL,
  `Active` enum('active','in-active') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patientid` (`patientid`,`visitid`),
  KEY `visitid` (`visitid`),
  KEY `doc_id` (`empid`),
  KEY `doc_id_2` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_cost`
--

CREATE TABLE IF NOT EXISTS `cash_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitid` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `cash_cost`
--

INSERT INTO `cash_cost` (`id`, `visitid`, `cost`, `package`, `date`) VALUES
(1, 1, 300, 9, '2013-07-25 14:56:24'),
(2, 2, 300, 9, '2013-07-26 09:09:50'),
(3, 3, 300, 9, '2013-07-26 10:50:17'),
(4, 4, 300, 9, '2013-07-26 11:27:49'),
(5, 5, 300, 9, '2013-07-26 12:06:19'),
(6, 6, 300, 9, '2013-07-26 12:14:10'),
(7, 7, 300, 9, '2013-07-27 08:17:59'),
(8, 8, 300, 9, '2013-07-27 08:41:55'),
(9, 9, 300, 9, '2013-07-27 09:02:32'),
(10, 10, 300, 9, '2013-07-27 09:12:42'),
(11, 11, 300, 9, '2013-07-27 09:13:01'),
(12, 12, 300, 9, '2013-07-27 09:17:21'),
(13, 13, 300, 9, '2013-07-27 09:19:33'),
(14, 14, 300, 9, '2013-07-27 09:23:47'),
(15, 15, 300, 9, '2013-07-27 09:23:51'),
(16, 16, 300, 9, '2013-07-27 09:24:58'),
(17, 17, 300, 9, '2013-07-27 09:25:33'),
(18, 18, 300, 9, '2013-07-27 09:30:44'),
(19, 19, 300, 9, '2013-07-27 09:34:12'),
(20, 20, 300, 9, '2013-07-27 09:40:54'),
(21, 21, 300, 9, '2013-07-27 09:43:52'),
(22, 22, 300, 9, '2013-07-27 09:46:24'),
(23, 23, 300, 9, '2013-07-27 09:48:57'),
(24, 24, 300, 9, '2013-07-27 09:58:25'),
(25, 25, 300, 9, '2013-07-27 10:04:20'),
(26, 26, 300, 9, '2013-07-27 10:10:53'),
(27, 27, 300, 9, '2013-07-27 10:15:32'),
(28, 28, 300, 9, '2013-07-27 10:20:04'),
(29, 29, 300, 9, '2013-07-27 10:20:34'),
(30, 30, 300, 9, '2013-07-27 10:22:34'),
(31, 31, 300, 9, '2013-07-27 10:24:04'),
(32, 32, 300, 9, '2013-07-27 10:25:06'),
(33, 33, 300, 9, '2013-07-27 10:27:41'),
(34, 34, 300, 9, '2013-07-27 10:28:00'),
(35, 35, 300, 9, '2013-07-27 10:30:01'),
(36, 36, 300, 9, '2013-07-27 10:31:43'),
(37, 37, 300, 9, '2013-07-27 10:31:44'),
(38, 38, 300, 9, '2013-07-27 10:36:07'),
(39, 39, 300, 9, '2013-07-27 10:37:43'),
(40, 40, 300, 9, '2013-07-27 10:40:35'),
(41, 41, 300, 9, '2013-07-27 10:43:32'),
(42, 42, 300, 9, '2013-07-27 10:44:55'),
(43, 43, 300, 9, '2013-07-27 10:45:55'),
(44, 44, 300, 9, '2013-07-27 10:48:01'),
(45, 45, 300, 9, '2013-07-27 10:49:39'),
(46, 46, 300, 9, '2013-07-27 10:52:44'),
(47, 47, 300, 9, '2013-07-27 10:55:03'),
(48, 48, 300, 9, '2013-07-27 10:55:38'),
(49, 49, 300, 9, '2013-07-27 11:00:35'),
(50, 50, 300, 9, '2013-07-27 11:02:04'),
(51, 51, 300, 9, '2013-07-27 11:03:24'),
(52, 52, 300, 9, '2013-07-27 11:59:31'),
(53, 53, 300, 9, '2013-07-27 12:10:51'),
(54, 54, 300, 9, '2013-07-27 12:12:10'),
(55, 55, 399, 9, '2013-07-27 12:12:44'),
(56, 56, 300, 9, '2013-07-27 12:14:57'),
(57, 57, 300, 9, '2013-07-27 12:15:09'),
(58, 58, 300, 9, '2013-07-27 12:15:19'),
(59, 59, 300, 9, '2013-07-27 12:20:06'),
(60, 60, 300, 9, '2013-07-27 12:20:44'),
(61, 61, 300, 9, '2013-07-27 12:21:26'),
(62, 62, 300, 9, '2013-07-27 12:23:04'),
(63, 63, 300, 9, '2013-07-27 12:25:40'),
(64, 64, 300, 9, '2013-07-27 12:29:32'),
(65, 65, 300, 9, '2013-07-27 12:29:50'),
(66, 66, 300, 9, '2013-07-27 12:29:51'),
(67, 67, 300, 9, '2013-07-27 12:30:47'),
(68, 68, 300, 9, '2013-07-27 12:33:49'),
(69, 69, 300, 9, '2013-07-27 12:34:43'),
(70, 70, 300, 9, '2013-07-27 12:35:00'),
(71, 71, 300, 9, '2013-07-27 12:42:27'),
(72, 72, 300, 9, '2013-07-27 12:42:36'),
(73, 73, 300, 9, '2013-07-27 12:48:51'),
(74, 74, 300, 9, '2013-07-27 12:57:59'),
(75, 75, 300, 9, '2013-07-27 13:02:07'),
(76, 76, 300, 9, '2013-07-27 13:04:35'),
(77, 77, 300, 9, '2013-07-27 13:05:20'),
(78, 78, 300, 9, '2013-07-27 13:10:47'),
(79, 79, 300, 9, '2013-07-27 13:16:22'),
(80, 80, 300, 9, '2013-07-27 13:18:44'),
(81, 81, 300, 9, '2013-07-27 13:29:33'),
(82, 82, 300, 9, '2013-07-27 13:33:07'),
(83, 83, 300, 9, '2013-07-27 13:37:57'),
(84, 84, 300, 9, '2013-07-27 13:43:23'),
(85, 85, 300, 9, '2013-07-27 14:08:09'),
(86, 86, 300, 9, '2013-07-27 14:12:04'),
(87, 87, 300, 9, '2013-07-27 14:19:50'),
(88, 88, 300, 9, '2013-07-27 14:28:00'),
(89, 89, 300, 9, '2013-07-27 14:30:33'),
(90, 90, 300, 9, '2013-07-27 14:33:30'),
(91, 91, 300, 9, '2013-07-27 14:36:59'),
(92, 92, 300, 9, '2013-07-27 14:39:07'),
(93, 93, 300, 9, '2013-07-27 14:41:59'),
(94, 94, 300, 9, '2013-07-27 14:50:42'),
(95, 95, 300, 9, '2013-07-27 14:53:16'),
(96, 96, 300, 9, '2013-07-27 14:55:29'),
(97, 97, 300, 9, '2013-07-27 14:58:59'),
(98, 98, 300, 9, '2013-07-27 15:02:59'),
(99, 99, 300, 9, '2013-07-27 15:10:31'),
(100, 100, 300, 9, '2013-07-27 15:19:38'),
(101, 101, 300, 9, '2013-07-27 15:22:00'),
(102, 102, 300, 9, '2013-07-27 15:23:39'),
(103, 103, 300, 9, '2013-07-27 15:26:20'),
(104, 104, 300, 9, '2013-07-27 15:28:35'),
(105, 105, 300, 9, '2013-07-27 15:30:59'),
(106, 106, 300, 9, '2013-07-27 15:33:22'),
(107, 107, 300, 9, '2013-07-27 15:36:03'),
(108, 108, 300, 9, '2013-07-27 15:38:16'),
(109, 109, 300, 9, '2013-07-27 15:39:59'),
(110, 110, 300, 9, '2013-07-27 15:42:30'),
(111, 111, 300, 9, '2013-07-27 15:45:09'),
(112, 112, 300, 9, '2013-07-27 15:48:17'),
(113, 113, 300, 9, '2013-07-27 15:51:07'),
(114, 114, 300, 9, '2013-07-27 15:53:10'),
(115, 115, 300, 9, '2013-07-27 15:56:06'),
(116, 116, 300, 9, '2013-07-27 15:58:47'),
(117, 117, 300, 9, '2013-07-27 16:41:01'),
(118, 118, 300, 9, '2013-07-27 17:18:45'),
(119, 119, 300, 9, '2013-07-29 10:41:19'),
(120, 120, 300, 9, '2013-07-29 12:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `check_up`
--

CREATE TABLE IF NOT EXISTS `check_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docid` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `complaints` text NOT NULL,
  `med_history` text NOT NULL,
  `systemic_inquiry` varchar(500) NOT NULL,
  `examination_findings` text NOT NULL,
  `diff` text NOT NULL,
  `remarks` text NOT NULL,
  `provisional` text NOT NULL,
  `working_diagnosis` text NOT NULL,
  `lab_tests` varchar(500) NOT NULL,
  `institute_field` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `diagnosis` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patientid` (`docid`,`visitid`),
  KEY `docid` (`docid`),
  KEY `visitid` (`visitid`),
  KEY `visitid_2` (`visitid`),
  KEY `visitid_3` (`visitid`),
  KEY `visitid_4` (`visitid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `check_up`
--

INSERT INTO `check_up` (`id`, `docid`, `visitid`, `complaints`, `med_history`, `systemic_inquiry`, `examination_findings`, `diff`, `remarks`, `provisional`, `working_diagnosis`, `lab_tests`, `institute_field`, `date`, `diagnosis`) VALUES
(1, 58, 3, 'headaches on and off for 1 day', 'No past history of hospitalization,HX of Dm and HTN in the family', 'the headache is frontal,no epistaxis,no dizziness', 'FGC  no pallour,no jaundice,Afebrile', '', '', '', 'to exclude tension headaches', '', '', '2013-07-26 11:28:59', 'tension headaches'),
(2, 58, 3, 'headaches on and off for 1 day', 'No past history of hospitalization,HX of Dm and HTN in the family', 'the headache is frontal,no epistaxis,no dizziness', 'FGC  no pallour,no jaundice,Afebrile', '', '', '', 'to exclude tension headaches', '', '', '2013-07-26 11:28:59', 'tension headaches'),
(3, 58, 4, 'cough,sneezing,runny nose for 2days', 'no hx of hospitalization', 'Theres rhinorrhoea,theres headache', 'no pallour,afebrile,no jaundice', '', '', '', 'Flu', '', '', '2013-07-26 12:04:43', 'flu'),
(4, 58, 5, 'runny nose,sneezing,slight headache', 'HX of hospitalization due to gun shot wound last year on the lt pelvis and back', 'scar on the rt lumbar region', 'fair general condition,not pale afebrile', '', '', '', 'Flu/Rhinitis', '', '', '2013-07-26 12:18:34', ''),
(5, 60, 7, 'pain lower abdomen on and off for a week; not able work,vomiting yesterday once, a small amount. ', 'Para 2G3; one abortion. child 15yr,admitted for abortion, 4 years,admitted in puerperium \\\\/malaria for last pregancy,LMP November 2012 - EDD Aug 22, ', 'felt cold last night,passing urine frequently; painful last month and given tx with some improvement,', 'pale+,no t pyrexial, no edema,abdo - fundal height 28 weeks, fetal heart heard. ,no tenderness', '', '', '', 'small for gestation fetus,?UTI,plasma glucose,urinalysis-micro,gyne review', '', '', '2013-07-27 10:13:03', 'SFGA pregnancy'),
(6, 63, 8, 'Coughing - 1 week,Running nose - ,Pain in the left wrist joint - 2 weeks,Pain in both knee joints - 3 months', 'Patient has had pain in both knees for the last three months. Pain is made worse during physical movements at the knee joints (going up the stairs, squatting). Pain relieved by resting the joint. Pain is not worse at any time of the day, constant throughout. Reports a popping sound from both knees during movement. Not feeling of warmth around the joint. No reported history of trauma preceding the complains.  About 2 weeks ago, the patient began to feel pain in the left wrist joint. Made worse again by movements about that joint. No other known relief or aggravators. Pains in both knees and wrist joints is moderate - with minimal interruption of activity., ,She also complains of a mild cough productive of yellowish sputum with a sore throat and running nose for the past 1 week. ,,Occupational History:- works in an eatery where she mostly cooks (now in her tenth year). ,,Family Hx:- married with two children (16 years and 4.5 years). Reports similar wrist joint pains in the 16 year old son.  Father dead (no date, no known cause). Mother alive and suffers from chronic knee joint pain.,,Social History:- no alcohol, no smoking', 'GIT:- no diarrhea, no vomiting, no dietary changes.,,GUT:- no changes in urinary character, colour. No dysuria. No vaginal discharge. ,,OBS/Gyn:- Last menstrual period seen December 2012. On Depo for  family Planning', 'General Condition:- Fair, not pale, not jaundiced, no oral thrush.,,CVS System:- S1 and S2 heard. No murmurs. No added sounds.,,Res:- clear air entry bilaterally. No crepitations. No added sounds.,,P/A:- normal fullness, no palpable organomegally. No area of tenderness. Normal bowel sounds.,,Musculoskeletal Examination:- Left and Right Knee joints:-  normal movements at both knee joints. No obvious tenderness. Crepitations on palpation. Left wrist joint:- good normal function. No restriction of movement. No tenderness on extreme adduction, abduction, flexion and extension.,', '', '', '', 'Pauci-articular Rheumatoid arthritis with URTI.', '', '', '2013-07-27 11:01:37', 'Pneumonia'),
(7, 60, 9, 'No complaints.', 'LMP dec 1 2012,Para3G3- 5, 2.5yr,Seen at Kamiti. 1 visit. Received 1 TT,On hematinics - since last month', 'No frequency or pain micturition,Nil else of note', 'Pallor+,No edema,FH 34 weeks,FHH and normal,', '', '', '', 'Normal pregnancy,Anemia,', '', '', '2013-07-27 10:26:07', 'Anemia in pregnancy'),
(8, 63, 10, 'Swelling on the right wrist joint:- 3 months', 'Patient has been generally well. Complaining of a painless swelling on the right wrist joint for the last 3 months. Progressively enlarging with minimal restriction of activity at the joint. She had a similar swelling earlier beside the current swelling, but it was removed in December 2012 because of its large size. No other complaints.,,Past Medical History:- No significant past medical/surgical history,Occupational History:- sells milk at a kiosk,Family History:- Married. Lives with spouse (works as a driver). No children yet.,OBS/GYN:- LNMP started on 22/07/2013. Normal cycle.', 'GIT:- has occasional upper epigastric pain.Relieved by dietary modification,All other systems unremarkable.', 'Good general condition. Not pale, not jaundiced, not cyanosed. No oral thrush.,Local Examination:- Firm,  nodular swelling on the dorsum of the right wrist joint. Mobile, not attached to skin below or to tissues beneath. No skin changes around area of swelling.,,Other systemic examination is unremarkable.', '', '', '', 'Lipoma', '', '', '2013-07-27 09:31:52', ''),
(9, 58, 11, 'abdominal fulness,bloating,heartburns,failure to conceive for the past 20yrs', 'seroreactive on HAART current CD4 count of 250.She has two children but her efforts of getting another child have failed.Theres history of steven johnsons syndrome due to nevirepine', 'no abdominal mass,epigastric tenderness', 'no pallor,afebrile,no jaundice,,P/A epigastric tenderness', '', '', '', 'Gastritis and ??secondary infertility', '', '', '2013-07-27 09:44:20', ''),
(10, 63, 12, 'Cough - 1 week,Hotness of body - 1 week,Running nose - 1 week', 'Patient has been unwell for the last 1 week with a wet cough, associated with hotness of body and running nose. The symptoms are worse, particularly at night but without difficulty in breathing. No reported chest pain. No other complains. ,,Past Medical History:- no significant past medical/surgical history,Family History:- last born in a family of three siblings. Lives with parents. Mother (sells clothes) and father (businessman). No family history of chronic illness.,Immunization:- Completed immunization schedule,Growth and development:- all milestones appropriate for age. No noted deviation. Now in the bay class at Joyland Academy.', 'GIT:- has had reduced appetite for the duration of illness. Passed two loose motions, non-bloody.,,Other systemic inquiry unremarkable', 'Fair general condition. Not pale. Not Jaundice. Afebrile,,CVS:- S1 and S2 heard. No murmurs. No added sounds,,RESP:- clear air entry bilaterally. No creps. No added sounds.,,Other systemic examination unremarkable.', '', '', '', 'Viral URTI', '', '', '2013-07-27 10:11:43', 'Viral URTI'),
(11, 60, 14, 'BP 137/85. Ht 1.57m,Temp 36.3,Wt 83kg,Frequently has blocked nose, tight chest especially in cold whether. Now for 2 weeks, although has had problem for 14 years,No cough. Blocked nose, headache,Feels hot and cold', 'During pregnancy had ? Asthma - 13 years ago', 'Signal itchiness on and off. Has discharge - yellowish,No frequency sometimes with occ pain,No abdo pain, dyspareunia,No previous Pap smear,', 'No pallor, Ln. ,throat clear,Tender sinuses,Chest clear, no rhonchi,No abdo tenderness', '', '', '', 'Sinusitis', '', '', '2013-07-27 10:00:09', 'Sinusitis'),
(12, 58, 16, 'Rt leg pain and swelling post trauma two weeks ago,chest pains leg pains', 'no previous hospitalization,Has 3 children', 'has rt leg pains and swelling,no cough', 'no pallor afebrile,vitals normal,R/S transmitted sounds,no creps,L/E tenderness on the rt leg,not warm,slight skin colour change', '', '', '', 'Bronchitis R/o fracture tibia', '', '', '2013-07-27 10:04:05', 'Bronchitis r/o fracture'),
(13, 63, 13, 'Pain in the right ear - 1 month now. ', 'Patient has had pain in the right ear, on and off, for some time now. Previously treated with ear drops (each treatment lasting about 5 days, specific drug not known). Patient said to have episodes of itching in the affected ear with continuous scratching using her finger. No ear discharge noted. An instance of hotness of body noted during the period of illness. Also complaints of occasional swelling around the affected ear.  Has otherwise been generally well.,,Family History:- 2nd born child in a family of 3 siblings with two parents. Mother and Father are both business persons.,,Developmental History:- she has progressed well with milestones appropriate for age. Now in Grade 2 (standard 2) of her local primary school. She is able to keep up with her peers in performance. ,,Immunization history:- Completed immunization schedule', 'All systemic inquiry is unremarkable.', 'Fair General Condition, not pale, not jaundiced, no oral thrush.,,Vital signs stable.,,Systemic Examination is unremarkable.,,Ear Examination:- inlflamed epithelial lining of the rigt external auditory meatus.,Accumlation of wax not seen.', '', '', '', 'Otitis Externa;', '', '', '2013-07-27 10:06:58', ''),
(14, 58, 15, 'rashes on the head(recurrent)', 'no  hx of hospitalization', 'whitish rash on the head', 'not pale afebrile', '', '', '', 'tinea capitis', '', '', '2013-07-27 10:21:06', 'tinea capitis'),
(15, 62, 24, 'No complaints patient wanted and elective ultra sound. ', 'No previous admissions. No chronic illness reported. Was diagnosed with anemia earlier in the pregnancy, was prescribed for hematinics but didn\\''t buy.', 'No significant findings', 'Mild palour, no jaundice, no ', '', '', '', 'Anemia related to pregnancy', '', '', '2013-07-27 12:40:07', 'Anemia'),
(16, 63, 26, 'No specific complaints. Showing up for wellness checkup.', 'No significant past medical or surgical history. has been generally well', 'No significant systemic inquiry details.,,Patient has been generally well. ,,Both parents alive and well and without significant health complaints.,,Family Planning History:- uses an implant for FP', 'Good General condition. Not pale, not jaundiced. No oral thrush.,,All systemic examination unremarkable,', '', '', '', 'Well client without significant Health complaints', '', '', '2013-07-27 10:23:24', ''),
(17, 62, 29, 'Epigastric pain,', 'No history of admissions or chronic illness', 'No major findings', 'Nil findings', '', '', '', 'Mild acidity', '', '', '2013-07-27 10:33:04', ''),
(18, 60, 17, 'Headache, fullness in head when bends, 4 daysno eye pain,No cold, cough,Back pain assoc,No fever. No tx', 'No previous similar problem,No previous ops,Currently implant,Married 2 - 10, 4,,Husband well.', 'Nil of note', 'Tender left maxillary sinus', '', '', '', 'Acute sinusitis', '', '', '2013-07-27 10:50:22', 'Sinusitis'),
(19, 63, 25, 'Headache for 3 months', 'No Significant past medical or surgical history. Has been largely well', 'Patient complains of a headache that has been present for the last 3 months. Started insidiously but there is no much difference between now and the onset of the complaints. The headache is on and off. No changes in vision or perception of unusual smells. No any areas of weakness in the limbs. The headache is relieved with off the counter analgesic medication. Aggravated by emotional upset. She is still able to carry on with her daily routines.,,Family History:- Mother (42 years old) said to hav', 'Fair General Condition. Not pale. Not jaundiced. No oral thrush.,,Vitals are all stable.,,CVS:- normal S1 and S2 heart sounds heard. No murmurs. No added sounds.,,Res:- normal air entry bilaterally. No added sounds. No crepitations,,CNS:- Conscious, oriented in time place and person. All assessible cranial nerves normal. Normal gait and speech.', '', '', '', 'Tension Headache.', '', '', '2013-07-27 10:49:22', ''),
(20, 58, 31, 'LT SIDED CHEST PAINS (OCCASIONAL)', 'NO HISTORY OF HOSPITALIZATION,THERE\\''S HISTORY OF ASTHMA IN THE FAMILY', 'NO PALLOUR ,AFEBRILE', 'R/S CHEST CLEAR,CVS NO ADDED SOUNDS', '', '', '', 'MYALGIA', '', '', '2013-07-27 10:59:02', 'MYALGIA'),
(21, 62, 19, 'Chest pain', 'Was treated for the same last month. ', 'occasional difficulty in breathing associated with cold spells. Chest pain for three years. Associated fatigue. No cough, no night sweats.,,Occasional headaches, Band headache. Had prescription lenses that broke. ', 'R/S - Normal breath sounds,,CNS - No significant findings', '', '', '', '?asthma', '', '', '2013-07-27 11:00:34', ''),
(22, 63, 20, 'Cough -  1 week,Running nose -  1 week,Whitish patches on the head with areas of hair loss:- 2 weeks,,', 'No significant past medical/surgical history', 'Patient has been generally well. Mother noticed the lesions in the hair 2 weeks ago. The affected areas are fluffy, whitish and without hair. No other associated history.,,Family history:- 1st born in a family of two other siblings. All other siblings alive and well.,,Growth and developmental history:- has progressed well and all milestones appropriate for age. Now in class 3 of primary school,,Immunization history - completed the immunization schedule.', 'Good General condition. Not pale. Not cyanosed. No oral thrush.,,Vitals - all stable.,,Systemic examination unremarkable. ,,Local lesion examination:- Whitish patches over the entire head with areas of scaling and hair loss. No other significant findings.', '', '', '', 'Tenia capitis', '', '', '2013-07-27 12:33:12', 'Tinea Capitis'),
(23, 58, 23, 'AMENORRHOEA FOR 2 MONTHS,NUMBNESS OF UPPER LIMBS,ABDOMINAL BLOATING', 'SHE HAD A PV DISCHARGE IN MAY,PARA 2+0,NO HX OF CONTRACEPTION,PREGNANCY TEST DONE IN A CLINIC NEGATIVE', 'NO DYSURIA,NO POLYDIPSIA,NO LOWER BACK PAINS', 'NO PALLOUR NO JAUNDICE,', '', '', '', 'AMENORROEA/P NEUROPATHY', '', '', '2013-07-27 14:42:45', 'pmneuropathy,amenorhhoea(non pregnancy related)'),
(24, 60, 47, 'Sticky eyes ,Itchy eyes for 5 days', 'HT tx for 2 months earlier this year', 'No headaches,Fell and hurt rt wrist', 'Tender swollen wrist, minimal movement,Discharging rt eye', '', '', '', '?fracture 1st metarcapal rt side,Hypertension,Conjunctivitis ,', '', '', '2013-07-27 12:17:58', ''),
(25, 63, 21, 'Cough - 4 days,running nose: - 4 days,Chest congestion:- 4 days,Hotness of body:- 4 days', 'No significant past medical history', 'Patient was well until about 4 days ago when he developed the above symptoms. The cough is exacerbated during the night with chest congestion and difficulty breathing. has similarly had associated hotness of body during the period of illness.,,Family History:- last born in a family of 2 other siblings. All other siblings, Mother and Father are all alive and well. No reported history of chronic family illness. ,,Immunization history:- Completed schedule,,Growth and Development:- all developmental', 'Fair General condition, not in respiratory distress.,,Resp:- clear air entry bilaterally. No crepitations nor additional sounds heard.,,CVS:- S1 and S2 heard. No murmurs or additional sounds on auscultation.,,Other systemic examination unremarkable.,', '', '', '', 'Pneumonia (mild)', '', '', '2013-07-27 12:25:37', ''),
(26, 58, 27, 'PARA 0+0 GRAVIDA1 AT 36WKS GESTATION HAS ABDOMINAL PAINS.NO PV BLEEDING OR DISCHARGE.LNMP 31/11/12', 'THERE WAS SLIGHT PV BLEEDING AT 20 WKS.ULTRASOUND WAS DONE WHICH SHOWED A VIABLE FETUS WITH AN EDD OF 7/9/13', 'ESSENTIALLY NORMAL', 'NO PALLOUR,NO JAUNDICE,P/A FH 37 WEEKS,FHHR,NO TENDERNESS', '', '', '', 'PREGNANCY AT 37 WEEKS', '', '', '2013-07-27 12:41:19', ''),
(27, 58, 34, 'SNEEZING,RUNNY NOSE', 'NO HX OF HOSPITALIZATION', 'ESSENTIALLY NORMAL', 'NO PALLOR NO JAUNDICE', '', '', '', 'ALLERGIC RHINITIS', '', '', '2013-07-27 12:51:57', 'ALLERGIC RHINITIS'),
(28, 63, 22, 'Rash - 1 week now', 'no significant past medical/surgical history', 'Patient has had a rash around the diaper area for three weeks and later developed a similar rash on the  face and back about 1 week ago. The rash is itchy but there is no reported hotness of body or redness of the conjunctiva. The rash on the face appeared suddenly all over the face. Has had a cough over the last three weeks as well with a running nose. An area with the rash on the back initially was macular, later became filled with fluid and eventually broke down to expose a raw underlying sur', 'patient in Fair general condition, not distressed. Conjunctiva not injected. No tearing,,Vitals are all stable.,,Local examination:-,,Macular rash around the perineum and ischial areas , with sections of  scarring. A healed lesion on the back. Similarly has small macular rash on the face.  ,,Other systemic examination unremarkable.', '', '', '', 'Viral Exanthema', '', '', '2013-07-27 12:51:17', ''),
(29, 60, 28, 'Itchy eyes for long time,No discharge', 'Nil of note', 'Well', 'Thickened eyelids', '', '', '', 'Allergic conjunctivitis,', '', '', '2013-07-27 12:52:26', ''),
(30, 58, 43, 'NASAL BLOCKAGE,SNEEZING(LONG STANDING)', 'NO HX OF HOSPITALIZATION', 'RHINORRHOEA WITH ACTIVE EYE LACRIMATION', 'NO PALLOR NO JAUNDICE,SWOLLEN ADENOIDS', '', '', '', 'ADENOID HYPERTROPHY', '', '', '2013-07-27 13:16:47', 'ADENOID HYPERTROPHY'),
(31, 63, 32, 'Abdominal pain:- 4 months', 'No significant past medical/surgical history.', 'Patient has had abdominal pain for the last 4 months, aching in character, moderate in severity, not interfering with daily activities. No known aggravating factors or relieving factors. The ache is constant during the day but felt to be particularly worse in the night while he is asleep. No identified aspects of diet that make the pain worse. No reported diarrhea, no vomiting, no change in appetite. No weight loss noted. Has not had blood in stool at any one time.,,Review of systems:-,,GUT - no', 'Good general condition. Not pale. Not jaundiced. Not cyanosed. No oral thrush. ,,All vitals stable.,,P/A exam:- normal fullness. No organomegaly. No palpable masses. Mild tenderness on palpation of the flanks.,,Other systemic examination is unremarkable.', '', '', '', 'Peptic Ulcer Disease,,R/O:- diverticulitis, Irritable Bowel syndrome', '', '', '2013-07-27 13:10:56', ''),
(32, 58, 56, 'COUGH,HEADACHE(TEMPORAL)', 'NO HX OF HOSPITALIZATION', 'THE COUGH IS PRODUCTIVE OF WHITISH SPUTUM WITH RUNNY NOSE,NO FEVERS', 'NO PALLOUR,AFEBRILE,R/S CHEST CLEAR,', '', '', '', 'URTI', '', '', '2013-07-27 13:24:52', 'URTI'),
(33, 62, 54, 'child with purulent ear discharge for 2 months also has infected ulcer on ear lobe. Mum HIV negative as at one year ago.,,', 'Prior treatment with topical anti biotic, no improvement', 'No other symptoms, otherwise well.', 'lymphadenopathy present(cervical and occipital), ,chest clear, addominal distension present (no organomegally), mild pallor present. Mild stones not delayed', '', '', '', 'Impetigo,Nutritional couselling done', '', '', '2013-07-27 13:26:25', ''),
(34, 58, 38, 'EPIGASTRIC PAINS,BLOATING,FLATULENCE', 'NO HX OF HOSPITALIZATION', 'NO DIARRHOEA NO VOMITTING', 'NO PALLOR NO JAUNDICE,VITALS NORMAL', '', '', '', 'GASTRITIS', '', '', '2013-07-27 13:29:42', 'GASTRITIS'),
(35, 60, 37, 'Cough 2 days, pain in chest when coughing- sternal. Very little phlegm, no fever,Pain lower abdo, radiating to the back.,Assoc with bloating and passing wind,No bleeding or PV discharge', 'Has been on tx for HT in past. No meds for 2 weeks,No other major illness, admissions', 'Weight stable,No PR bleeding ,No headaches,Non smoker,Normal micturition ', 'No pallor, jaundice,, edema,BP 141/98. PR 78,HS 1 &2 heard, no S3,Reduced AE left lower zone with crepitations,RR 20/ min', '', '', '', 'LRTI', '', '', '2013-07-27 13:28:00', ''),
(36, 58, 35, 'BACKACHES,HEADACHES(FRONTAL),RETRO STERNAL CHEST PAINS', 'NO HX OF HOSPITALIZATION,NO RECENT TRAVEL UPCOUNTRY.HISTORY OF HYPERTENSION IN THE FAMILY', 'NO DIZZINESS,NO DYSURIA', 'NO PALLOR, NO JAUNDICE,,CVS NO ADDED SOUNDS', '', '', '', 'ARTHRITIS', '', '', '2013-07-27 15:01:45', 'arthritis'),
(37, 64, 59, 'round dry crusty itchy leisions on the lumber area extending to the groin for 2 yrs', 'premedicated with unknown antifungals with frequent reccurence', 'GIT-normal appetite,no diarrhoea or constipation,RS-no abnormality noted,MSS-NAD,CNSNAD', 'dry nonseptic crusty skin extending ti the groin and penis and upper part of th thighs', '', '', '', 'CHRONIC TINEA COPORIS', '', '', '2013-07-27 13:39:34', ''),
(38, 63, 69, 'Abdominal Pain- 1 day', 'Once hospitalized for eye related problems', 'Patient complaining of abdominal pain for one day now. It started suddenly yesterday at a time of exertion and has felt the pain since. The pain has not gotten worse or been relieved at all since. She reports no per vaginal bleeding, no pv drainage of liquor. She also perceives active foetal movements over the same period.,,OBS/GYN History:- Para 1 + 0 Gravida 2. No reported loss of pregnancy. LNMP:- 21/02/2013. Has attended Antenatal clinic regularly for the current pregnancy.,,Social History:-', 'Gravid patient:,FHT:- 28 weeks. GBD:=  22 weeks.,,P/A:- Distended as above fundal height. No area of tenderness. ,,CVS:- normal S1 and S2 heart sounds heard. No added sounds,RESP:- Normal air entry bilaterally. No crepitations. No added sounds.,,Other systemic examination normal.,', '', '', '', '? Multi-foetal Gestation.,', '', '', '2013-07-27 14:50:28', '? Multi-foetal Gestation'),
(39, 60, 42, 'Itchy skin more than a year, patchy,Pain on micturition - abdominal at end of micturition on off. No tx,,No change ', 'Nil of note', 'Nil else', 'Small areas of red rash, on anterior chest and lower abdo,Papular rash pubic are', '', '', '', 'Fungal skin infection', '', '', '2013-07-27 13:41:58', ''),
(40, 58, 64, 'INABILITY TO GET A CHILD(THE WIFE ALREADY HAS A CHILD FROM A PREVIOUS MARRIAGE)', 'NO HX OF ADMISSION,HX OF ALCOHOL INTAKE BUT STOPPED NO HX OF SMOKING,NO HX OF STD,HIV TEST LASTLY DONE IN 2010', 'ESSENTIALLY NORMAL', 'NO PALLOR, AFEBRILE NORMAL EXTERNAL GENITALIA', '', '', '', 'INFERTILITY', '', '', '2013-07-27 15:04:30', 'infertility'),
(41, 63, 36, 'Complaining of abdominal pain:- 2 weeks', 'No significant past medical/surgical history', 'Patient generally well. Complains of episodic abdominal pain. No diarrhea. Has vomited once during the illness. No changes in appetite. No repeat symptoms for some time now.', 'Fair general condition. Not pale, not jaundiced. Not cyanosed. No oral thrush.,,Vitals - all stable.,,P/A:- Normal fullness. No organomegaly. No area of tenderness. ,,Other systemic examination remarkably normal.', '', '', '', 'Abdominal Colic?', '', '', '2013-07-27 13:52:13', ''),
(42, 63, 39, 'No complaint at the moment.', 'No significant past medical history', 'No complaint today. Child fairly well. Appearing for maintenance check', 'Good general condition. Not pale. No oral thrush. ,,all vitals stable.,,All systemic examination is unremarkable.', '', '', '', 'Well child', '', '', '2013-07-27 13:56:12', ''),
(43, 63, 39, 'No complaint at the moment.', 'No significant past medical history', 'No complaint today. Child fairly well. Appearing for maintenance check', 'Good general condition. Not pale. No oral thrush. ,,all vitals stable.,,All systemic examination is unremarkable.', '', '', '', 'Well child', '', '', '2013-07-27 13:56:13', ''),
(44, 62, 71, 'Joint pains', 'History of arthritis, Been treated for 2 years 8 months. Cannot remember the medication she is on. Se has been on digoxin for a heart disease. Has stopped for one year. She reports that she was on digoxin for cardiac hypertrophy.  ', 'Back pain and ankle pains.', 'Full examinartion to be carried out on Monday the 29th .', '', '', '', 'Athritis', '', '', '2013-07-27 13:56:18', ''),
(45, 60, 48, 'Dental problems - referred,Itchiness don below ESP after period,Self tx. Also after sex with ,No dyspareunia ,', 'No previous admits,Para 4+0,Married husband alive,', 'No abdo pain,,Nil else', 'Not done', '', '', '', 'Vaginal discharge- syndromic tx.', '', '', '2013-07-27 13:56:23', ''),
(46, 62, 52, 'Child with headache for 1 week,  persistent mostly after school, reports good vision, is able to see blackboard in class. Also reports night time cough (3 times per week )as well as runny nose in the mornings. Also has exercise induced broncho spasm and snores at night', 'None notable', 'Otherwise normal', 'Conjuctival mudding present, hypertrophied inferior turbinates with lots of mucus visible, tonsils normal, mo lyphadenopathy, pallor or jaundice present.,R/S, chest shape normal, chest clear with mild air trapping.', '', '', '', 'Asthama and allergic rhinitis', '', '', '2013-07-27 13:59:26', ''),
(47, 58, 41, 'cough,sneezing,numbness of the limbs(recurrent)', 'no hx of hospitalization,she uses stove and charcoal to cook', 'productive cough whitish sputum,no chest pains,no night sweats', 'no pallor,afebrile,r/s chest clear,', '', '', '', 'bronchitis', '', '', '2013-07-27 14:02:23', ''),
(48, 62, 53, 'Chills and back pain for one week.,Cough', 'No previous admissions', 'Chest pains accompanied left upper limb pain', 'Swollen tonsils', '', '', '', 'Upper respiratory tract infection in an overweight patient to rule out cardiac disease.', '', '', '2013-07-27 14:11:28', ''),
(49, 64, 40, 'round hypopigmented leisions on the right side of the chest.,cough productive yellow sputum.,', 'no known chronic illness or long term medication.,no history of any admission as patient.,mother on lactation period.', 'RS no DIB,  no wheezing, ,GIT NAD,MMS NAD,', 'vesicular breathsounds hard.,no crepitations, no bronchial hard.,generalized facial rashes.', '', '', '', 'acne,rhinitis', '', '', '2013-07-27 14:13:41', ''),
(50, 60, 46, 'Pain on swallowing, no cough, but has phlegm.2 days,Pain lt flank 1 week,Pain on micturition ,Frequency,Has been recently for 3 days and with pessaries,Also has diarrhea for 1 week,No fever, chills+', 'No previous similar problems,Para 1+0,Husband has no complaints', 'Nil of note', 'Tender left flank. No obvious masses,No abdo tenderness ,Tonsils enlarged', '', '', '', 'URTI,UTI/pyelonephritis ,', '', '', '2013-07-27 14:15:54', ''),
(51, 58, 51, 'chest tightness cough(recurrent),pregnant at month gestation goes for anc clinic at kahawa west hospital', 'Hx of admission for malaria more than 5 years ago', 'non productive cough,no wheezing,no chest pains', ' no pallor no jaundice,p/a fundal height 24wks,fhhr', '', '', '', 'pregnancy at 24 weeks', '', '', '2013-07-27 14:18:58', ''),
(52, 63, 44, 'Abdominal pain:- for more than 15 years', 'Last hospitalized for the birth of one of her children. No other significant details.', 'Patient complaining of long standing abdominal pain (for about 15 years). The pain is aggravated by certain foods and relieved by taking the medications. Has been on various treatments for ulcers with temporary relief (no medical records to show past diagnoses). The pain does not interfere with the quality of life.,,Family History:- mother to 6 children, all alive and well. Husband dead long time ago of a \\"Cancer on the leg\\".,,Social History:- stays at home, small scale/peasant farmer.', 'Fair General condition. Not pale. Not jaundiced.,,P/A:- Normal fullness, no palpable organomegally, No area of tenderness. ,,Other systemic examination unremarkable.', '', '', '', 'Peptic Ulcer Disease?', '', '', '2013-07-27 14:20:59', ''),
(53, 62, 58, 'upper limbs weakness, worse with the right upper limb.', 'Was treated for neuropathy, stopped medication over three years ago. ', 'CNS and musculoskeletal inquiry are none remarkable.', 'No significant findings on ', '', '', '', 'Muscle spasms', '', '', '2013-07-27 14:23:53', ''),
(54, 62, 57, 'patient with pain on micturation, frequency of micturation as well as lower abdominal pains. Symptoms persistent from 2010 (on and off). No dyspareunia reported. No PV discharge.Also reports extreme pain during menstration. Vitals weight 99kgs, BP 118/77', 'None notable, No history of diabetes in the family', 'No other symptoms', 'Obese, no pallor, no jaundice, no lymphadenopathy,PA-Tenderness and guarding in suprapubic region', '', '', '', 'UTI, cysititis R/O Diabetes Mellitus', '', '', '2013-07-27 16:21:14', 'UTI with cystitis'),
(55, 58, 45, 'nasal blockage,', 'no hx of hospitalization', 'essentially normal', 'no pallor,afebrile', '', '', '', 'nasal blockage', '', '', '2013-07-27 14:25:39', ''),
(56, 60, 65, 'Cough,Headache,Fever 2 days,Tired,No SOB,', 'Nil of note', 'Had diarrhea las week. Her mom also had the same', 'Swollen tonsils,Chest clear,Abdo - no masses ', '', '', '', 'URTI', '', '', '2013-07-27 14:30:01', ''),
(57, 63, 73, 'Complaining of abdominal pain:- 1 week', 'Previously hospitalized for the delivery of her last born child. No  other significant medical history ', 'Patient complaining of abdominal pain localised in the epigastrium and in the suprapubic region. She has had similar problems previously but treated as peptic ulcers with temporary relief. Pain made worse by eating certain foods and relieved by taking these medications . The pain has not progressed but continues to feel the dull abdominal ache. No fever associated with the illness.,,Family Hx:- Married and lives with the husband who is alive and well. Has 5 children alive and well. No chronic he', 'Fair general condition. not pale, not jaundiced. ,,All vitals are stable.,,P/A:- distended abdomen (with large fat mass) and a visible healed cesarean scar. No area of tenderness appreciated on deep palpation. No organomegaly.,,Other systemic examination is unremarkable,', '', '', '', 'Peptic ulcer Disease?', '', '', '2013-07-27 14:34:34', ''),
(58, 62, 87, 'Lower limb pain,Epigastric pain', 'Has been treated for the same severally. Last prescription was not picked due to lack of funds', 'Near sighted, ', 'Nil findings', '', '', '', 'Neuropathy, cause to be investigated', '', '', '2013-07-27 14:39:54', ''),
(59, 63, 72, 'Cough - 3 days,Diarrhea:- 3days', 'No significant past medical illness', 'Has had above symptoms for the last 3 days. No associated hotness of body. No reported blood staining in the stool. No vomiting. Similarly, has reduced appetite and said to be eating poorly.,,Immunization history:- completed schedule,,Growth and development history:- milestones appropriate for age.,', 'Fair general condition. Not pale. No oral thrush.,,All vitals stable.,,P/A:- normal fullness. No organomegaly. No are of tenderness', '', '', '', 'Gastro-enteritis?', '', '', '2013-07-27 14:43:34', ''),
(60, 64, 74, 'abd pain,headache on an off,', 'no diarrhoea,no constipation, no bloating,,no premedication. no known familial ', 'RS no abnormality detected,,MSS no abnormality detecet', 'general exam essentialy normal', '', '', '', 'gastral enteritis', '', '', '2013-07-27 14:43:53', ''),
(61, 60, 62, 'Pain in mouth for1 day,Headache just today', 'Had operation on foot for ulcer 3 yr ago. Still painful. Burnt when a child. Deformed foot,Small area of redness back jaw', 'Nil of note', 'Deformed rt foot,No sensation,Ulcer noted', '', '', '', 'Chronic foot problem similar to diabetic foot. Advised care in same way,Periodontal inflammation', '', '', '2013-07-27 14:46:00', ''),
(62, 62, 55, '2 year old boy, temp 36.2, wt 24kgs. Child has cough for 1 week, mostly at night, every day. Has been treated for cough prior to visit without improvement. Also has diarrhoea, 2 bouts today, 3 times yesterday. stool semi formed. No blood in stool. Uses tap water fordrinking without boiling or treating.', 'Mother has histroy of asthma.', 'None notable', 'Mild pallor noted, no lymphadenopathy, Mucus membranes slightly dry.Stuffy nose ,R/S Chest clear.', '', '', '', 'URTI,Mother has parecetamol at home. Adviced to use warm water with honey to clear URTI, also counselled on importance of boiling water, or using water guard as well as importance of hand washing.', '', '', '2013-07-27 14:48:35', ''),
(63, 62, 84, 'scalp fungal infection', 'Has been treated severally but unsuccessfully.', 'Nil findings', 'Fungal infection of the scalp', '', '', '', 'Topical fungal infection', '', '', '2013-07-27 14:51:00', ''),
(64, 58, 92, 'chest pains,epigastric pain,', 'no hx of hospitalization', 'non productive cough,no dyspepsia', 'not pale,a febrile', '', '', '', 'gastritis', '', '', '2013-07-27 14:54:56', ''),
(65, 58, 89, 'eye aches and discharge', 'no hx of admission', 'essentially normal', 'no pallor,afebrile', '', '', '', 'bacterial conjuctivitis', '', '', '2013-07-27 14:58:35', ''),
(66, 62, 61, 'No menses for 9 months. Last period for only two days in June', 'has been three month contraceptive injection for the past seven months.Worried about lack of periods. Patient has been off the injection for one month now.', 'Nil findings', 'Nil findings', '', '', '', 'Parient with lack of menses due to contraceptive use. Patient re-assured.', '', '', '2013-07-27 15:00:31', ''),
(67, 63, 63, 'Cough = 3 weeks ,Chest pain:- 3 weeks,', 'No other significant past medical history apart from that documented below', 'Patient had an insidious onset of above symptoms about 3 weeks ago. Cough is non-productive, associated with chest pain and chest congestion. Has had similar problems in the past whenever it got cold, once hospitalized for three days. Has been medicated on antibiotics previously with good improvement. ,,Family History:- mother to one boy. married and lives with spouse. ,,Social history:- Both spouses are business persons. ', 'Fair General Condition. Not pale, not jaundiced. No oral thrush.,,Vitals - all stable.,,Systemic examination unremarkable.', '', '', '', 'Pneumonia', '', '', '2013-07-27 15:13:42', 'Pneumonia'),
(68, 62, 49, '7 month old baby. temp 36.2. today c/o greenish watery stool for 2 days, has one bout daily. baby breastfeed for 6 months then complimentary feeds introduced. Now on porridge (flour has ground nuts and beans) introduced last week.', 'None', 'None remarkable', 'Baby irritable but consolable, no pallor observed, extremities warm, bowel sounds slightly increased.Chest clear.,Milestones achieved.,', '', '', '', 'URTI, likely viral,Mother couselled on the combination of flour being used for baby porridge, likely causing indigestion as ingredients not being cooked long enough.', '', '', '2013-07-27 15:12:39', ''),
(69, 64, 66, 'pain at both breast for 4 months,no nipple discharge,pvd yellowish in colour foul smellin,polyuria, no dysuria', 'no hx of admission,chronic illness, no longterm meds ,para 2+0 g3,gbd 19/40', 'GIT- NAD,RS-NAD,MSS-NAD ', 'BREAST EXAM normal local temp,no discharge nipples everted,PA; palpable mass at 18weeks ', '', '', '', 'vaginitis in pregnancy,r/o uti', '', '', '2013-07-27 15:14:46', ''),
(70, 62, 79, 'Pain while swallowing and head ache for three days', 'Has had adenoids removed', 'Nil findings', 'Swollen tonsils with inflammation of the pharynx', '', '', '', 'Sore throat.', '', '', '2013-07-27 15:15:09', ''),
(71, 58, 81, 'LOWER ABD PAINS RADIATING TO THE BACK', 'PREVIOUSLY TREATED FOR PID.SHES CURRENTLY ON RX FOR AMOEBIASIS', 'ESSENTIALLY NORMAL', 'NOT PALE,NO JAUNDICE', '', '', '', 'TO EXCLUDE AMOEBIASIS AND UTI', '', '', '2013-07-27 16:31:43', 'lumbago'),
(72, 62, 78, 'Difficulty in reading for seven months', 'No admissions, no symptoms of DM or HTN', 'Headache associated with blurring of vision. far vision better than near vision.', 'Nil', '', '', '', 'Presbyopia', '', '', '2013-07-27 15:22:40', ''),
(73, 62, 96, '8 month old baby, mother complains of  sound in the chest on and off. No snoring reported,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,', 'None', 'Nothing remarkable', 'Active baby, not pale, no lymphnodes, ,R/S chest clear, has transmitted sounds,CVS S1 S2 heard, no thrills or murmurs heard,ENT nasal congestion noted,', '', '', '', 'stable baby', '', '', '2013-07-27 15:26:21', ''),
(74, 64, 90, 'itchy round hypopigmented lesions on the face for a month,', 'previously treated with gruseofulvin, albedazole ,no hx of other chronic illness', 'GIT; no diarrhoea,no connnstipation,no [NAD],RS nad,MSS nad', 'irregular rough leisions on the rt side of th face', '', '', '', 'TINEA VESICOLOR', '', '', '2013-07-27 15:26:28', ''),
(75, 63, 60, 'Headache for the last 1 month.,Pruritic eruptions for 1 month.', 'No significant past medical/surgical history', 'Patient has had episodic headaches for the last one month, worse in the morning but remits in the course of the day. Most intense on the vertex. No known aggravators but it is relieved by analgesics. Does not significantly impair her daily life and is able to go about her usual activities.,,She has similarly experienced itchy lesions on whole body trunk, now spreading to other parts of the body. Using anti-pruritic lotions to relieve the itching.,,Family:- married, living with husband. Has 1 chi', 'Fair General Conditions. Not pale, not jaundiced, no oral thrush. Has extensive maculo-papular (flat and raised) lesions on whole trunk that are itchy. ,,All vitals are stable.,,Other systemic examination is unremarkable.', '', '', '', 'Eczema - Pruritic', '', '', '2013-07-27 15:28:30', ''),
(76, 58, 50, 'HEADACHE LT SIDED BACK PAINS.NO DYSURIA', 'NO HX OF HOSPITALIZATION,PARA 1+0,ON DEPO PROVERA USE', 'ESSENTIALLY NORMAL', 'NO PALLOR AFEBRILE,,P/A NO MASS,NO TENDERNESS', '', '', '', 'UTI', '', '', '2013-07-27 15:31:24', ''),
(77, 58, 86, 'HEARTBURNS,ABD BLOATING', 'NO HX OF HOSPITALIZATION', 'ESSENTIALLY NORMAL', 'NO PALLOR AFEBRILE', '', '', '', 'LUMBAGO/NSAID INDUCED GASTRITIS', '', '', '2013-07-27 15:37:00', 'NSAID/LUMBAGO'),
(78, 62, 99, 'Child with chest congestion, as well as nasal congestion, both have been persistent since birth. Cough and congestion mostly present at night. Also snores at night. Has been treated numerous times with anti biotics with no permanent improvement.', 'Admiited to hospital one week aftyer birth, due to complications related to not crying after birth', 'Nothing remarkable.,,,,,,,,,,', 'Nasal blockage observed, throat clear, chest clear with normal air entry', '', '', '', 'Asthma', '', '', '2013-07-27 15:38:01', ''),
(79, 58, 102, 'ON RX FOR CEREBRAL PALSY HAS FEBRILE CONVULSIONS', 'HASBEEN ON PHYSIOTHERAPY AND ANTICONVULSANTS IN THE PAST', 'FLACCID,', 'OE FGC NOT PALE FEBRILE,CONVULSING ACTIVELY', '', '', '', 'CEREBRAL PALSY/PNEUMONIA', '', '', '2013-07-27 15:48:17', 'CP'),
(80, 62, 93, 'headache, stomach pain and chest pains,', 'Nil findings', 'Diarrhoea, nausea, no vomiting. Headache is generalised, neck pains worse with swallowing hot foods. No tenesmus.', 'No pharyngeal inflammation, no findings on examination', '', '', '', 'enteritis', '', '', '2013-07-27 17:16:21', 'enteritis'),
(81, 64, 70, 'coughing that is productive for 3 weeks.reports that sputum is yellowish in colour foul smelling,non blood,no hhx of night sweats,no tb contact but reports of weight lose.', 'no hx of addmission,no hx of other chronic illness reported,premed-amoxicillin', 'RS; difficulty in breathing worse at night,no wheezing.,CVS;no othopnea,no,pnd,hx easy fatigubility', 'RS Exam;vesicular breathsounds heard, normal percusion tone,CVS Exam; pulse rate 77b/m regular,no mumumur, mid clavicular AB 6th intercoastal space,submandibular,cervical ly', '', '', '', 'upper resp tract infection, pharyngitis', '', '', '2013-07-27 16:00:25', ''),
(82, 64, 70, 'coughing that is productive for 3 weeks.reports that sputum is yellowish in colour foul smelling,non blood,no hhx of night sweats,no tb contact but reports of weight lose.', 'no hx of addmission,no hx of other chronic illness reported,premed-amoxicillin', 'RS; difficulty in breathing worse at night,no wheezing.,CVS;no othopnea,no,pnd,hx easy fatigubility', 'RS Exam;vesicular breathsounds heard, normal percusion tone,CVS Exam; pulse rate 77b/m regular,no mumumur, mid clavicular AB 6th intercoastal space,submandibular,cervical ly', '', '', '', 'upper resp tract infection, pharyngitis', '', '', '2013-07-27 16:01:23', ''),
(83, 62, 109, 'Itching in the ears during cold spells, also has nasal congestion during cold periods. pain on micturition for one week, no frequency reported, no blood in urine noted, associated lower abdominal pains reported. No vaginal discharge reported,no vulval itchiness', 'Has a regular sexual partner. Both tested HIV negative 3 months ago.Reports not having a sexual relation with any other person. Both', 'Nothing remarkable', 'conjuctival mudding present, darkening of the eyelids observed, nasal congestion presented. Inguinal lymph nodes not enlarged,P/A lower abdominal tenderness on palpation.', '', '', '', 'UTI,Allergic rhinitis', '', '', '2013-07-27 16:02:57', ''),
(84, 62, 98, 'cough and running nose', 'No significant past medical history', 'No difficulty in breathing, ,', 'Normal chest findings.', '', '', '', 'URTI', '', '', '2013-07-27 16:09:00', ''),
(85, 62, 110, 'photophobia-on and off for 6 month\\''s,knee pain-bilateral-for 6-7 months,,Photophobia-associated with tearing, eye itchy-also has symptoms of allergic rhinitis-occasional early morning cough, no exercise induced bronchospasm,,Knee pain-bilateral-on squatting- no diurnal variation, no swelling', 'Nil significant', 'No other symptoms', 'Good gen condition, conjunctival muddying,allergic shiners,ENT-Hypertrphied inferior turbinates- L>R,Throat-clear,RS- clear,Eye-pupils reactive, visual acuity-not tested,', '', '', '', 'Allergic Conjunctivitis, allergic rhinitis', '', '', '2013-07-27 16:15:29', ''),
(86, 58, 112, 'CAME FOR CHECK UP', 'NO HX OF HOSPITALIZATION', 'ESSENTIALLY NORMAL', 'NAD', '', '', '', 'CLINICALLY STABLE', '', '', '2013-07-27 16:18:57', ''),
(87, 62, 111, 'Lower back pain (left lower back). ', 'was involved in a RTA last year. Internal fixation done. One week history of lower back pain with no radiation. No swelling, no tenderness noted.', 'No findings', 'No tenderness or swelling. Reduced range of lower limb due to accident. Stiff rt hip.', '', '', '', 'Muscle spasms', '', '', '2013-07-27 16:20:39', ''),
(88, 58, 113, 'rt sided facial pain', 'on acyclovir,neuroforte and tramadol after being diagnosed with herpes zooster in march', 'pustular lesions on the rt side of the face', 'no pallor,afebrile,herpes scar on the rt side of the face', '', '', '', 'herpes zooster/post herpetic neuralgia', '', '', '2013-07-27 16:44:53', ''),
(89, 62, 101, 'Epigastric pain, mostly in the evening when lying down and exacerbated by vegetable proteins', 'previous admission for an aborting pregnancy', 'No diarrhea, nausea but no vomiting', 'No organomegally noted, no tenderness.', '', '', '', 'GERD', '', '', '2013-07-27 16:45:52', ''),
(90, 64, 95, 'vomitingx2,reduced appetite, abd pain located at the umbilicus.reports symptoms are on and off for more than an yr. reports having been treated severaly with antimalarials with improvement at time,,passing stool normaly that is realy foul smelling', 'no known chronic illness reported,no hx of addmission', 'GIT; no diarrhea, no constipation, no bloating,no heartburn,RS; NAD,MSS; NAD,CNS; NAD', 'no pallor, poor nutritional status,poor hygiene,PA; NAD', '', '', '', 'GASTRAL ENTERITIS', '', '', '2013-07-27 16:47:38', ''),
(91, 58, 114, 'eye itching,reddening', 'no hx of hospitalization', 'nad', 'nad', '', '', '', 'allergic conjuctivitis', '', '', '2013-07-27 16:52:00', ''),
(92, 62, 100, 'Coughs, headache and running nose', 'Has been ill since friday with above. has been given amoxil, and paracetamol', 'Nil findings on other systems', 'clear chest, no inflammation of tonsils noted. ', '', '', '', 'URTI', '', '', '2013-07-27 16:57:08', ''),
(93, 58, 108, 'Dizziness,fainting', 'No hx of hospitalization,delivered via svd 2 months ago', 'Nad', 'Slightly pale,breastfeeding her baby', '', '', '', 'Anaemia post delivery', '', '', '2013-07-27 17:01:24', ''),
(94, 64, 94, 'epigastric pain \\''heartburn, nausea,dizziness, for 3 weeks,pain is postprandial,dysphagia,', 'premed- action analgesics,chronic mild back pain;works at a quary', 'RS; Cough,GUT;polyuria, dysuria', 'submandibular, cervical lymphadenopathy', '', '', '', 'UTI, TONSILITIS, SCIATICA, GASTRITIS', '', '', '2013-07-27 17:03:27', ''),
(95, 62, 116, 'Cough and difficulty in breathing when exposed to cold. Shooting pain in the rt leg with prolonged sitting. ', 'No treatment for asthma. Has been treated for HTN previously and has been on and off meds. ', ' Nil significant findings', 'Positive straight leg test', '', '', '', 'Disc compression', '', '', '2013-07-27 17:09:56', ''),
(96, 64, 105, 'Chest pain radiating to the back for two years.reports to have been treated with several antibiotics with improvement though symptoms are recurrent.,', 'no hx of addmision. ,no hx of any chronic illness reported', 'RS; no cough,no dib no,other systems esentialy normal', 'RS Exam- vesicular breathsounds', '', '', '', 'pneumonia', '', '', '2013-07-27 17:23:20', ''),
(97, 64, 105, 'Chest pain radiating to the back for two years.reports to have been treated with several antibiotics with improvement though symptoms are recurrent.,', 'no hx of addmision. ,no hx of any chronic illness reported', 'RS; no cough,no dib no,other systems esentialy normal', 'RS Exam- vesicular breathsounds', '', '', '', 'pneumonia', '', '', '2013-07-27 17:27:01', ''),
(98, 62, 118, 'Lumb in the left breast. Had a mammogram done but was reported as not being malignant. Client reports it as being painful especially during ovulation', 'NO history of injury, DM or HTN.', 'Nil findings', 'Left nipple indrawn, 0.5cm diameter lump in the left breast, lower left quadrant/ Mobile, non-tender. Indrawn nipple on left breast.', '', '', '', 'Breast mass to rule out ca breast', '', '', '2013-07-27 17:29:05', ''),
(99, 58, 106, 'cough for 1 week,arm pains', 'no hx of hospitalization', 'nad', 'no pallor afebrile', '', '', '', 'strain R/o arthritis', '', '', '2013-07-27 17:35:45', 'strain'),
(100, 58, 119, 'back pains(lower),leg pains(longstanding)', 'was previously on treatment for cardiac disease and arthritis at Rhodes clinic from 2010 to 2012.She developed the heart disease and hypertension during pregnancy.She was previously on digoxin and benzathine penicillin(penadur) injections which she stopped taking on her own.Shes on norplant as a contraceptive', 'there\\''s numbness of upper and lower limbs,no dysuria,no pv bleeding or discharge', 'o/e FGC,slightly obese borderline blood pressure,pulse rate 72/min,no oedema,R/S chest clear,CVS s1 s2 heard,no added sounds,P/A no organomegally,other systems essentially normal,', '', '', '', 'Arthritis R/o cardiac disease', '', '', '2013-07-29 11:11:01', ''),
(101, 58, 119, 'back pains(lower),leg pains(longstanding)', 'was previously on treatment for cardiac disease and arthritis at Rhodes clinic from 2010 to 2012.She developed the heart disease and hypertension during pregnancy.She was previously on digoxin and benzathine penicillin(penadur) injections which she stopped taking on her own.Shes on norplant as a contraceptive', 'there\\''s numbness of upper and lower limbs,no dysuria,no pv bleeding or discharge', 'o/e FGC,slightly obese borderline blood pressure,pulse rate 72/min,no oedema,R/S chest clear,CVS s1 s2 heard,no added sounds,P/A no organomegally,other systems essentially normal,', '', '', '', 'Arthritis R/o cardiac disease', '', '', '2013-07-29 11:44:29', ''),
(102, 58, 120, 'chest pains,cough with occasional haemoptysis (recurrent),mostly during cold weather,palpitations,dizziness.', 'No hx of hospitalization,No hx of TB contact.no hx of asthma in in the family', 'No night sweats,no weight loss', 'o/e FGC no pallor,afebrile,no lymphadenopathy', '', '', '', 'pneumonia r/oTB', '', '', '2013-07-29 12:55:44', 'asthma'),
(103, 58, 120, 'chest pains,cough with occasional haemoptysis (recurrent),mostly during cold weather,palpitations,dizziness.', 'No hx of hospitalization,No hx of TB contact.no hx of asthma in in the family', 'No night sweats,no weight loss', 'o/e FGC no pallor,afebrile,no lymphadenopathy', '', '', '', 'pneumonia r/oTB', '', '', '2013-07-29 12:55:44', 'asthma'),
(104, 58, 120, 'chest pains,cough with occasional haemoptysis (recurrent),mostly during cold weather,palpitations,dizziness.', 'No hx of hospitalization,No hx of TB contact.no hx of asthma in in the family.she was previously treated with benzathine penicillin,hydrocortisone,erythromycin,cetrizine,prednisolone', 'No night sweats,no weight loss', 'o/e FGC no pallor,afebrile,no lymphadenopathy', '', '', '', 'pneumonia r/o Asthma', '', '', '2013-07-29 12:55:44', 'asthma'),
(105, 58, 122, 'chest pains radiating to the back,headache,cough', 'no recent travel upcountry,no hx of hospitalization', 'unproductive cough,no dizziness', 'O/E FGC no pallor,no jaundice,afebrile', '', '', '', 'URTI', '', '', '2013-07-30 14:21:42', ''),
(106, 58, 124, 'chills,epigastric pains,epigastric swelling(longstanding).shes pregnant at 7 months gestation.shes not yet started ANC clinic para 2+0 GR 3.LNMP December EDD 22/9/12', 'no history of hospitalization,DTC done in November last year was negative', 'Nad', 'O/E FGC no pallor, a febrile,P/A epigastric hernia(reducible),Fundal height 36 weeks,fetal heart rate heard and regular', '', '', '', 'pregnancy at 36 weeks ', '', '', '2013-07-31 15:00:02', 'pregnancy at 36 weeks'),
(107, 58, 124, 'para 2+0 gravida 3 at 36 weeks gestation  COMPLAINS OF EPIGASTRIC PAINS,LOWER BACK PAINS', 'NO HX OF HOSPITALIZATION', 'NO DIARRHOEA,NO DYSURIA,NO COUGH', 'OE FGC NO PALLOR AFEBRILE,P/A EPIGASTRIC HERNIA,       FUNDAL HEIGHT 36 WEEKS,       FETAL HEART RATE HEARD REGULAR ', '', '', '', 'PREGNANCY AT 36 WEEKS GESTATION', '', '', '2013-07-31 15:00:02', 'pregnancy at 36 weeks');
INSERT INTO `check_up` (`id`, `docid`, `visitid`, `complaints`, `med_history`, `systemic_inquiry`, `examination_findings`, `diff`, `remarks`, `provisional`, `working_diagnosis`, `lab_tests`, `institute_field`, `date`, `diagnosis`) VALUES
(108, 58, 124, 'para 2+0 gravida 3 at 36 weeks gestation  COMPLAINS OF EPIGASTRIC PAINS,LOWER BACK PAINS, LNMP DEC 2012 EDD 22/9/12', 'NO HX OF HOSPITALIZATION', 'NO DIARRHOEA,NO DYSURIA,NO COUGH', 'OE FGC NO PALLOR AFEBRILE,P/A EPIGASTRIC HERNIA,       FUNDAL HEIGHT 36 WEEKS,       FETAL HEART RATE HEARD REGULAR ', '', '', '', 'PREGNANCY AT 36 WEEKS GESTATION', '', '', '2013-07-31 15:00:02', 'pregnancy at 36 weeks'),
(109, 58, 125, 'cough(dry),runny nose,chills', 'she took artemether and aceclofenac yesterday without improvement.No recent travel upcountry', 'no diarrhoea no vomitting,no dysuria', 'o/e ill looking,lacrimating,rhinorrhoea', '', '', '', 'URTI', '', '', '2013-08-01 12:26:20', 'URTI'),
(110, 58, 126, 'chills,general body malaise for 2 days.', 'No recent travel upcountry,She currently has a 3 week old child who is breast feeding', 'No diarrhea,no cough,no vomitting', 'no pallor,febrile,Inflamed cracked nipples', '', '', '', 'Mastitis', '', '', '2013-08-08 11:59:34', 'mastitis'),
(111, 58, 127, 'throat pains,cough', 'was treated elsewhere with amoxyclav and celestamine.No recent travel upcountry', 'no diarrhoea no vomitting,no dysuria', 'O/e FGC NO PALLOR,AFEBRILE', '', '', '', 'BRONCHITIS', '', '', '2013-08-13 07:22:30', 'BRONCHITIS'),
(112, 58, 128, 'lower back pains,nausea,vomitting,loose stools on and off', 'no recent travel upcountry,takes alcohol and smokes occasionally', 'NAD', 'no pallor,afebrile,chest clear,epigastric tenderness', '', '', '', 'Gastritis', '', '', '2013-08-15 09:42:18', 'PUD'),
(113, 58, 131, 'facial rash', 'no family history of allergy,no known drug allergy', 'NAD', 'pallor,afebrile', '', '', '', 'atrophic dermatitis', '', '', '2013-08-15 09:48:23', ''),
(114, 58, 132, 'dizziness,nausea,headache,chills', 'para 1+0,lnmp may 2013,no hx of contraceptive use', 'NAD', 'no pallor,afebrile', '', '', '', 'pregnancy', '', '', '2013-08-15 10:16:16', 'UTI in pregnancy'),
(115, 58, 136, 'headache(global) on and off.no dizziness,occasional blurred vision.body weakness', 'No recent travel upcountry,on treatment for menorrhagia.gets occasional heavy menses', 'no dysuria,no pv bleeding', 'O/E FGC NO PALLOR,AFEBRILE,CVS NO ADDED SOUNDS,NO ANKLE OEDEMA', '', '', '', 'TENSIONAL HEADACHE', '', '', '2013-08-16 10:15:48', ''),
(116, 58, 136, 'HEADACHE,(TEMPORAL)ON AND OFF.', 'NO RECENT TRAVEL UPCOUNTRY.SHES BEEN TREATED SEVERALLY FOR MENOMETOORHAGIA BY SEVERAL GYNAEGOLOGIST', 'NO DYSURIA,NO PV DISCHARGE', 'O/E NO PALLOR AFEBRILE', '', '', '', 'TENSIONAL HEADACHE R/O ANAEMIA', '', '', '2013-08-16 10:26:17', ''),
(117, 58, 138, 'cough,vomitting (post prandial) for 1 day', 'recently treated for cord sepsis.No hx of hospitalization', 'no fevers,no diarrhoea,no vomitting', 'R/S chest clear,CVS S1 S2 heard,no added sounds', '', '', '', 'URTI', '', '', '2013-08-21 12:42:18', ''),
(118, 58, 139, 'chest pains,difficulty in breathing,chills.No cough,has occasional night sweats', 'Recent travel upcountry,No hx of asthma in the family,No hx of smoking or alcoholism', 'No haemoptysis', 'O/E FGC no pallor,afebrile,R/s bilateral crepitations,no rhonchi', '', '', '', 'BRONCHIOLITIS R/o pneumonia', '', '', '2013-08-21 14:20:51', 'pneumonia'),
(119, 61, 142, 'DFGHJKL', 'FGHJKL;', 'FGHJKL;\\''', 'FGHJKL;\\''', '', '', '', 'FGHJKL;', '', '', '2013-08-28 06:06:56', ''),
(120, 61, 140, 'Fever,headaches,sweating,painful joints', 'Malaria,amoeba,typhoid', 'Head swollen', 'Painful abdomen', '', '', '', 'Swollen glands', '', '', '2013-08-29 11:17:12', 'sickly'),
(121, 61, 141, 'djg', 'kjfjgdf', 'ksdjf', 'jsdfhsd', '', '', '', 'ikusdfsdih', '', '', '2013-08-29 19:55:59', ''),
(122, 61, 144, 'gdf', 'fgdffdg', 'dfgdf', 'sdfdsf', '', '', '', 'sdfsd', '', '', '2013-08-29 19:59:27', ''),
(123, 61, 145, 'hdfsj', 'jsdfh', 'jksdfh', 'usfh', '', '', '', 'jdfhj', '', '', '2013-08-29 20:29:33', 'kldfksdf'),
(124, 61, 147, 'errt', 'rt', 'rt', 'rt', '', '', '', 'rt', '', '', '2013-08-30 03:05:08', 'hfgtt'),
(125, 61, 148, 'fg', 'fh', 'fhg', 'fhg', '', '', '', 'gjh', '', '', '2013-08-30 03:12:01', ''),
(126, 61, 149, 'dfd', 'frfr', 'uyu', 'iikj', '', '', '', 'jhjh', '', '', '2013-08-30 05:33:44', 'hdfhgdhd'),
(127, 61, 150, 'gdf', 'gdf', 'hfg', 'hfg', '', '', '', 'hfg', '', '', '2013-08-30 05:39:28', ''),
(128, 61, 153, 'sdggd', 'shdh', 'hghgh', 'fhfg', '', '', '', 'hdfg', '', '', '2013-08-30 07:18:06', 'jfghdjdj'),
(129, 61, 154, 'dfgdf', 'dfgdfg', 'ertert', 'dfgdf', '', '', '', 'dfgdfg', '', '', '2013-08-30 09:09:40', ''),
(130, 61, 155, 'ndjasdbj', 'jsdfjsdf', 'fjsjdk,fnsjd', 'nzcbnq', '', '', '', 'jsjfsdf', '', '', '2013-09-02 18:22:22', ''),
(131, 61, 156, 'jdasdjasndj', 'kjskdfjnskdfks', 'kkasfksdfksd', 'kaskfskdfksdfk', '', '', '', 'knfksdfksskasf', '', '', '2013-09-02 18:48:21', ''),
(132, 66, 157, 'Sickly', 'Sickly', 'Sickly', 'Sickly', '', '', '', 'Sickly', '', '', '2013-09-05 08:25:44', ''),
(133, 66, 160, 'Headache', 'fevers and sweating', 'neuro', 'none', '', '', '', 'none', '', '', '2013-09-11 17:01:35', ''),
(134, 66, 161, 'Sick', 'Sicl', 'Sick', 'Sick', '', '', '', '', '', '', '2013-09-11 17:13:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE IF NOT EXISTS `costs` (
  `visitid` int(11) NOT NULL,
  `package` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `Mpesa` varchar(50) NOT NULL,
  `plus` varchar(10) NOT NULL,
  `paid` enum('paid','not paid') NOT NULL DEFAULT 'not paid',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`visitid`, `package`, `cost`, `Mpesa`, `plus`, `paid`, `id`, `send`, `date`) VALUES
(410, '4', 1600, 'DE34TR567', '', 'paid', 1, '', '2013-06-20 11:46:46'),
(1, '9', 0, '', 'cash', 'paid', 2, '', '2013-07-25 14:56:24'),
(2, '9', 0, '', 'cash', 'paid', 3, '', '2013-07-26 09:09:50'),
(3, '9', 0, '', 'cash', 'paid', 4, '', '2013-07-26 10:50:17'),
(4, '9', 0, '', 'cash', 'paid', 5, '', '2013-07-26 11:27:49'),
(5, '9', 0, '', 'cash', 'paid', 6, '', '2013-07-26 12:06:19'),
(6, '9', 0, '', 'cash', 'paid', 7, '', '2013-07-26 12:14:10'),
(7, '9', 0, '', 'cash', 'paid', 8, '', '2013-07-27 08:17:59'),
(8, '9', 0, '', 'cash', 'paid', 9, '', '2013-07-27 08:41:55'),
(9, '9', 0, '', 'cash', 'paid', 10, '', '2013-07-27 09:02:32'),
(10, '9', 0, '', 'cash', 'paid', 11, '', '2013-07-27 09:12:42'),
(11, '9', 0, '', 'cash', 'paid', 12, '', '2013-07-27 09:13:01'),
(12, '9', 0, '', 'cash', 'paid', 13, '', '2013-07-27 09:17:21'),
(13, '9', 0, '', 'cash', 'paid', 14, '', '2013-07-27 09:19:33'),
(14, '9', 0, '', 'cash', 'paid', 15, '', '2013-07-27 09:23:47'),
(15, '9', 0, '', 'cash', 'paid', 16, '', '2013-07-27 09:23:51'),
(16, '9', 0, '', 'cash', 'paid', 17, '', '2013-07-27 09:24:58'),
(17, '9', 0, '', 'cash', 'paid', 18, '', '2013-07-27 09:25:33'),
(18, '9', 0, '', 'cash', 'paid', 19, '', '2013-07-27 09:30:44'),
(19, '9', 0, '', 'cash', 'paid', 20, '', '2013-07-27 09:34:12'),
(20, '9', 0, '', 'cash', 'paid', 21, '', '2013-07-27 09:40:54'),
(21, '9', 0, '', 'cash', 'paid', 22, '', '2013-07-27 09:43:52'),
(22, '9', 0, '', 'cash', 'paid', 23, '', '2013-07-27 09:46:24'),
(23, '9', 0, '', 'cash', 'paid', 24, '', '2013-07-27 09:48:57'),
(24, '9', 0, '', 'cash', 'paid', 25, '', '2013-07-27 09:58:25'),
(25, '9', 0, '', 'cash', 'paid', 26, '', '2013-07-27 10:04:20'),
(26, '9', 0, '', 'cash', 'paid', 27, '', '2013-07-27 10:10:53'),
(27, '9', 0, '', 'cash', 'paid', 28, '', '2013-07-27 10:15:32'),
(28, '9', 0, '', 'cash', 'paid', 29, '', '2013-07-27 10:20:04'),
(29, '9', 0, '', 'cash', 'paid', 30, '', '2013-07-27 10:20:34'),
(30, '9', 0, '', 'cash', 'paid', 31, '', '2013-07-27 10:22:34'),
(31, '9', 0, '', 'cash', 'paid', 32, '', '2013-07-27 10:24:04'),
(32, '9', 0, '', 'cash', 'paid', 33, '', '2013-07-27 10:25:06'),
(33, '9', 0, '', 'cash', 'paid', 34, '', '2013-07-27 10:27:41'),
(34, '9', 0, '', 'cash', 'paid', 35, '', '2013-07-27 10:28:00'),
(35, '9', 0, '', 'cash', 'paid', 36, '', '2013-07-27 10:30:01'),
(36, '9', 0, '', 'cash', 'paid', 37, '', '2013-07-27 10:31:43'),
(37, '9', 0, '', 'cash', 'paid', 38, '', '2013-07-27 10:31:44'),
(38, '9', 0, '', 'cash', 'paid', 39, '', '2013-07-27 10:36:07'),
(39, '9', 0, '', 'cash', 'paid', 40, '', '2013-07-27 10:37:44'),
(40, '9', 0, '', 'cash', 'paid', 41, '', '2013-07-27 10:40:35'),
(41, '9', 0, '', 'cash', 'paid', 42, '', '2013-07-27 10:43:32'),
(42, '9', 0, '', 'cash', 'paid', 43, '', '2013-07-27 10:44:55'),
(43, '9', 0, '', 'cash', 'paid', 44, '', '2013-07-27 10:45:55'),
(44, '9', 0, '', 'cash', 'paid', 45, '', '2013-07-27 10:48:01'),
(45, '9', 0, '', 'cash', 'paid', 46, '', '2013-07-27 10:49:39'),
(46, '9', 0, '', 'cash', 'paid', 47, '', '2013-07-27 10:52:44'),
(47, '9', 0, '', 'cash', 'paid', 48, '', '2013-07-27 10:55:03'),
(48, '9', 0, '', 'cash', 'paid', 49, '', '2013-07-27 10:55:38'),
(49, '9', 0, '', 'cash', 'paid', 50, '', '2013-07-27 11:00:35'),
(50, '9', 0, '', 'cash', 'paid', 51, '', '2013-07-27 11:02:04'),
(51, '9', 0, '', 'cash', 'paid', 52, '', '2013-07-27 11:03:24'),
(52, '9', 0, '', 'cash', 'paid', 53, '', '2013-07-27 11:59:31'),
(53, '9', 0, '', 'cash', 'paid', 54, '', '2013-07-27 12:10:51'),
(54, '9', 0, '', 'cash', 'paid', 55, '', '2013-07-27 12:12:10'),
(55, '9', 0, '', 'cash', 'paid', 56, '', '2013-07-27 12:12:44'),
(56, '9', 0, '', 'cash', 'paid', 57, '', '2013-07-27 12:14:57'),
(57, '9', 0, '', 'cash', 'paid', 58, '', '2013-07-27 12:15:09'),
(58, '9', 0, '', 'cash', 'paid', 59, '', '2013-07-27 12:15:19'),
(59, '9', 0, '', 'cash', 'paid', 60, '', '2013-07-27 12:20:06'),
(60, '9', 0, '', 'cash', 'paid', 61, '', '2013-07-27 12:20:44'),
(61, '9', 0, '', 'cash', 'paid', 62, '', '2013-07-27 12:21:26'),
(62, '9', 0, '', 'cash', 'paid', 63, '', '2013-07-27 12:23:04'),
(63, '9', 0, '', 'cash', 'paid', 64, '', '2013-07-27 12:25:40'),
(64, '9', 0, '', 'cash', 'paid', 65, '', '2013-07-27 12:29:32'),
(65, '9', 0, '', 'cash', 'paid', 66, '', '2013-07-27 12:29:50'),
(66, '9', 0, '', 'cash', 'paid', 67, '', '2013-07-27 12:29:51'),
(67, '9', 0, '', 'cash', 'paid', 68, '', '2013-07-27 12:30:48'),
(68, '9', 0, '', 'cash', 'paid', 69, '', '2013-07-27 12:33:49'),
(69, '9', 0, '', 'cash', 'paid', 70, '', '2013-07-27 12:34:43'),
(70, '9', 0, '', 'cash', 'paid', 71, '', '2013-07-27 12:35:00'),
(71, '9', 0, '', 'cash', 'paid', 72, '', '2013-07-27 12:42:27'),
(72, '9', 0, '', 'cash', 'paid', 73, '', '2013-07-27 12:42:36'),
(73, '9', 0, '', 'cash', 'paid', 74, '', '2013-07-27 12:48:51'),
(74, '9', 0, '', 'cash', 'paid', 75, '', '2013-07-27 12:57:59'),
(75, '9', 0, '', 'cash', 'paid', 76, '', '2013-07-27 13:02:07'),
(76, '9', 0, '', 'cash', 'paid', 77, '', '2013-07-27 13:04:35'),
(77, '9', 0, '', 'cash', 'paid', 78, '', '2013-07-27 13:05:20'),
(78, '9', 0, '', 'cash', 'paid', 79, '', '2013-07-27 13:10:47'),
(79, '9', 0, '', 'cash', 'paid', 80, '', '2013-07-27 13:16:22'),
(80, '9', 0, '', 'cash', 'paid', 81, '', '2013-07-27 13:18:44'),
(81, '9', 0, '', 'cash', 'paid', 82, '', '2013-07-27 13:29:33'),
(82, '9', 0, '', 'cash', 'paid', 83, '', '2013-07-27 13:33:07'),
(83, '9', 0, '', 'cash', 'paid', 84, '', '2013-07-27 13:37:57'),
(84, '9', 0, '', 'cash', 'paid', 85, '', '2013-07-27 13:43:23'),
(85, '9', 0, '', 'cash', 'paid', 86, '', '2013-07-27 14:08:09'),
(86, '9', 0, '', 'cash', 'paid', 87, '', '2013-07-27 14:12:04'),
(87, '9', 0, '', 'cash', 'paid', 88, '', '2013-07-27 14:19:50'),
(88, '9', 0, '', 'cash', 'paid', 89, '', '2013-07-27 14:28:00'),
(89, '9', 0, '', 'cash', 'paid', 90, '', '2013-07-27 14:30:33'),
(90, '9', 0, '', 'cash', 'paid', 91, '', '2013-07-27 14:33:31'),
(91, '9', 0, '', 'cash', 'paid', 92, '', '2013-07-27 14:36:59'),
(92, '9', 0, '', 'cash', 'paid', 93, '', '2013-07-27 14:39:07'),
(93, '9', 0, '', 'cash', 'paid', 94, '', '2013-07-27 14:41:59'),
(94, '9', 0, '', 'cash', 'paid', 95, '', '2013-07-27 14:50:42'),
(95, '9', 0, '', 'cash', 'paid', 96, '', '2013-07-27 14:53:16'),
(96, '9', 0, '', 'cash', 'paid', 97, '', '2013-07-27 14:55:29'),
(97, '9', 0, '', 'cash', 'paid', 98, '', '2013-07-27 14:58:59'),
(98, '9', 0, '', 'cash', 'paid', 99, '', '2013-07-27 15:02:59'),
(99, '9', 0, '', 'cash', 'paid', 100, '', '2013-07-27 15:10:31'),
(100, '9', 0, '', 'cash', 'paid', 101, '', '2013-07-27 15:19:38'),
(101, '9', 0, '', 'cash', 'paid', 102, '', '2013-07-27 15:22:00'),
(102, '9', 0, '', 'cash', 'paid', 103, '', '2013-07-27 15:23:39'),
(103, '9', 0, '', 'cash', 'paid', 104, '', '2013-07-27 15:26:20'),
(104, '9', 0, '', 'cash', 'paid', 105, '', '2013-07-27 15:28:36'),
(105, '9', 0, '', 'cash', 'paid', 106, '', '2013-07-27 15:30:59'),
(106, '9', 0, '', 'cash', 'paid', 107, '', '2013-07-27 15:33:22'),
(107, '9', 0, '', 'cash', 'paid', 108, '', '2013-07-27 15:36:03'),
(108, '9', 0, '', 'cash', 'paid', 109, '', '2013-07-27 15:38:16'),
(109, '9', 0, '', 'cash', 'paid', 110, '', '2013-07-27 15:39:59'),
(110, '9', 0, '', 'cash', 'paid', 111, '', '2013-07-27 15:42:30'),
(111, '9', 0, '', 'cash', 'paid', 112, '', '2013-07-27 15:45:09'),
(112, '9', 0, '', 'cash', 'paid', 113, '', '2013-07-27 15:48:17'),
(113, '9', 0, '', 'cash', 'paid', 114, '', '2013-07-27 15:51:07'),
(114, '9', 0, '', 'cash', 'paid', 115, '', '2013-07-27 15:53:11'),
(115, '9', 0, '', 'cash', 'paid', 116, '', '2013-07-27 15:56:07'),
(116, '9', 0, '', 'cash', 'paid', 117, '', '2013-07-27 15:58:47'),
(117, '9', 0, '', 'cash', 'paid', 118, '', '2013-07-27 16:41:01'),
(118, '9', 0, '', 'cash', 'paid', 119, '', '2013-07-27 17:18:45'),
(119, '9', 0, '', 'cash', 'paid', 120, '', '2013-07-29 10:41:19'),
(120, '9', 0, '', 'cash', 'paid', 121, '', '2013-07-29 12:13:36'),
(121, '3', 1600, '', '', 'not paid', 122, '', '2013-07-30 11:52:57'),
(122, '9', 300, '', '', 'not paid', 123, '', '2013-07-30 13:32:02'),
(123, '9', 300, '', '', 'not paid', 124, '', '2013-07-30 13:32:56'),
(124, '9', 300, '', '', 'not paid', 125, '', '2013-07-31 13:25:19'),
(125, '9', 300, '', '', 'not paid', 126, '', '2013-08-01 12:01:38'),
(126, '9', 300, '', '', 'not paid', 127, '', '2013-08-08 11:32:08'),
(127, '9', 300, '', '', 'not paid', 128, '', '2013-08-13 06:50:48'),
(128, '9', 300, '', '', 'not paid', 129, '', '2013-08-13 08:48:03'),
(129, '9', 300, '', '', 'not paid', 130, '', '2013-08-13 09:07:40'),
(130, '9', 300, '', '', 'not paid', 131, '', '2013-08-13 09:34:17'),
(131, '9', 300, '', '', 'not paid', 132, '', '2013-08-13 10:05:31'),
(132, '9', 300, '', '', 'not paid', 133, '', '2013-08-13 10:08:37'),
(133, '9', 300, '', '', 'not paid', 134, '', '2013-08-13 10:15:44'),
(134, '9', 300, '', '', 'not paid', 135, '', '2013-08-16 06:56:19'),
(135, '9', 300, '', '', 'not paid', 136, '', '2013-08-16 09:42:56'),
(136, '9', 300, '', '', 'not paid', 137, '', '2013-08-16 09:54:05'),
(137, '9', 300, '', '', 'not paid', 138, '', '2013-08-20 14:06:24'),
(138, '9', 300, '', '', 'not paid', 139, '', '2013-08-21 12:33:34'),
(139, '9', 300, '', '', 'paid', 140, '', '2013-08-29 20:38:15'),
(140, '2', 130, '', '', 'not paid', 141, '', '2013-08-23 10:11:21'),
(141, '1', 130, '', '', 'not paid', 142, '', '2013-08-23 11:21:00'),
(142, '4', 1600, '', '', 'not paid', 143, '', '2013-08-28 06:01:20'),
(143, '9', 300, '', '', 'not paid', 144, '', '2013-08-29 19:53:03'),
(144, '4', 1600, '', '', 'not paid', 145, '', '2013-08-29 19:57:41'),
(145, '9', 300, '', '', 'paid', 146, '', '2013-08-29 20:38:37'),
(146, '2', 130, '', '', 'not paid', 147, '', '2013-08-29 20:40:21'),
(147, '9', 300, '', '', 'paid', 148, '', '2013-08-30 03:01:24'),
(148, '9', 300, '', '', 'paid', 149, '', '2013-08-30 03:09:53'),
(149, '9', 300, '', '', 'paid', 150, '', '2013-08-30 05:31:29'),
(150, '3', 1600, '', '', 'paid', 151, '', '2013-08-30 05:37:53'),
(151, '3', 1600, '', '', 'not paid', 152, '', '2013-08-30 05:41:25'),
(152, '9', 300, '', '', 'paid', 153, '', '2013-08-30 05:41:52'),
(153, '9', 300, '', '', 'paid', 154, '', '2013-08-30 07:09:07'),
(154, '9', 300, '', '', 'paid', 155, '', '2013-08-30 09:08:29'),
(155, '4', 1600, '', '', 'not paid', 156, '', '2013-09-02 18:18:55'),
(156, '9', 300, '', '', 'not paid', 157, '', '2013-09-02 18:43:13'),
(157, '9', 300, '', '', 'not paid', 158, '', '2013-09-05 08:23:48'),
(158, '3', 1600, '', '', 'paid', 159, '', '2013-09-09 06:10:39'),
(159, '9', 300, '', '', 'paid', 160, '', '2013-09-09 06:54:02'),
(160, '3', 1600, '', '', 'not paid', 161, '', '2013-09-11 16:41:12'),
(161, '9', 300, '', '', 'not paid', 162, '', '2013-09-11 17:10:21'),
(162, '2', 130, '', '', 'paid', 163, '', '2013-09-14 08:39:04'),
(163, '9', 300, '', '', 'paid', 164, '', '2013-09-14 08:41:05'),
(164, '9', 300, '', '', 'paid', 165, '', '2013-09-14 08:42:08'),
(165, '3', 1600, '', '', 'paid', 166, '', '2013-09-14 08:46:54'),
(166, '2', 130, '', '', 'paid', 167, '', '2013-09-14 08:47:48'),
(167, '1', 130, '', '', 'paid', 168, '', '2013-09-14 08:48:52'),
(168, '4', 1600, '', '', 'paid', 169, '', '2013-09-14 09:00:28'),
(169, '3', 1600, '', '', 'paid', 170, '', '2013-09-14 09:01:18'),
(170, '4', 1600, '', '', 'paid', 171, '', '2013-09-14 09:07:39'),
(171, '2', 130, '', '', 'paid', 172, '', '2013-09-14 09:09:23'),
(172, '9', 300, '', '', 'paid', 173, '', '2013-09-14 09:34:01'),
(173, '2', 130, '', '', 'paid', 174, '', '2013-09-14 09:35:01'),
(174, '3', 1600, '', '', 'paid', 175, '', '2013-09-14 09:35:29'),
(175, '2', 130, '', '', 'paid', 176, '', '2013-09-14 09:36:07'),
(176, '9', 300, '', '', 'paid', 177, '', '2013-09-14 09:36:42'),
(177, '9', 300, '', '', 'paid', 178, '', '2013-09-14 09:38:55'),
(178, '3', 1600, '', '', 'paid', 179, '', '2013-09-14 09:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `department_orders`
--

CREATE TABLE IF NOT EXISTS `department_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `department` varchar(500) NOT NULL,
  `ordered` int(11) NOT NULL,
  `issued` enum('no','yes') NOT NULL,
  `date_ordered` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `department_orders`
--

INSERT INTO `department_orders` (`id`, `empid`, `item_id`, `department`, `ordered`, `issued`, `date_ordered`) VALUES
(35, 0, 2, 'Doctor', 10, 'yes', '0000-00-00'),
(36, 61, 3, 'Doctor', 100, 'yes', '0000-00-00'),
(37, 61, 1, 'Doctor', 14, 'yes', '0000-00-00'),
(38, 61, 4, 'Doctor', 7, 'yes', '2013-09-04'),
(39, 65, 2, 'Nurse', 11, 'yes', '2013-09-04'),
(40, 65, 3, 'Nurse', 100, 'yes', '2013-09-04'),
(41, 65, 2, 'Nurse', 10, 'yes', '2013-09-04'),
(42, 65, 1, 'Nurse', 45, 'no', '2013-09-09'),
(43, 65, 3, 'Nurse', 100, 'no', '2013-09-09'),
(44, 66, 3, 'Doctor', 10, 'no', '2013-09-09'),
(45, 66, 3, 'Doctor', 7, 'no', '2013-09-09'),
(46, 66, 4, 'Doctor', 2, 'no', '2013-09-09'),
(47, 67, 3, 'Lab Tech', 100, 'no', '2013-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `drug_allergies`
--

CREATE TABLE IF NOT EXISTS `drug_allergies` (
  `patientid` int(20) NOT NULL,
  `dallergy` varchar(255) NOT NULL,
  KEY `patient_id` (`patientid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(255) NOT NULL,
  `Sname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `NationalID` int(11) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Active','In-active') NOT NULL DEFAULT 'In-active',
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `Fname` (`Fname`),
  KEY `Sname` (`Sname`),
  KEY `Lname` (`Lname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `Fname`, `Sname`, `Lname`, `DOB`, `sex`, `NationalID`, `Phone`, `residence`, `Email`, `username`, `password`, `status`, `type`) VALUES
(57, 'Helen ', 'Mulwa', 'Kanini', '1983-07-18', 'female', 24558859, '0728902845', 'Umoja', 'nishkanini@yahoo.com', 'Kanini', 'd1133275ee2118be63a577af759fc052', 'Active', 'Nurse'),
(58, 'Mark', 'Kamau', 'Ngugi', '1983-12-21', 'male', 23266932, '0721444248', 'Buruburu', 'markram45@gmail.com', 'Mark', '96f2c1b00563b9c89d04dcbc7e7736d0', 'Active', 'Doctor'),
(59, 'Margaret', 'Kaberi', 'Nyaruai', '1988-09-18', 'female', 25969512, '0724875009', 'Buruburu', 'nyaruaikaberi@gmail.com', 'Margaret', 'ebd6f0dc913702ad426b9bd431977579', 'Active', 'Nurse'),
(60, 'Sylvia', 'Ojoo', 'Achieng', '1961-08-19', 'female', 12345678, '0735800040', 'Lavington', 'sylivaaojoo@gmail.com', 'Ojoo', '4011323ea1cdc6649a57e359ff31a4d2', 'Active', 'Doctor'),
(61, 'Fiona', 'Rasanga', 'Atieno', '1992-09-29', 'female', 29968615, '0710359163', 'Nairobi West', 'rasangafiona@gmail.com', 'Rasanga', '0aa4df055284ae5dec17cbd255e28971', 'Active', 'Doctor'),
(62, 'Erima', 'Lyndon', 'Marani', '1977-09-08', 'male', 20548365, '078173707', 'South B', 'lmarani@healthstrat.or.ke', 'Marani', '8e2908de7862dc834e025966befdfb36', 'Active', 'Doctor'),
(63, 'Gabriel', 'Buluku', 'Mahasi', '1983-05-19', 'male', 22799046, '0786397125', 'Ngara', 'gmahasi@yahoo.com', 'Mahasi', '394a95a8905ae0a6b2d9b99a62dd3279', 'Active', 'Doctor'),
(64, 'Diana', 'Kibira', 'Wangui', '1988-11-19', 'female', 27019759, '0721208694', 'Ruiru', 'wanguidkibira@yahoo.com', 'Wangui', '2837f8b7c706c4c59f018443d474406d', 'Active', 'Doctor'),
(65, 'nurse', 'nurse', 'nurse', '1983-09-23', 'female', 29968615, '0723231983', 'Donholm', 'rasangafiona@gmail.com', 'nurse', '0701aa317da5a004fbf6111545678a6c', 'Active', 'Nurse'),
(66, 'doctor', 'doctor', 'doctor', '1993-04-14', 'male', 25896963, '0721862243', 'Lavington', 'mary.mariana.ben@gmail.com', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'Active', 'Doctor'),
(67, 'lab', 'lab', 'lab', '1992-11-18', 'female', 25896963, '0727884006', 'Sega', 'fiona.rasanga@ymail.com', 'lab', 'f9664ea1803311b35f81d07d8c9e072d', 'Active', 'Lab Tech'),
(68, 'pharm', 'pharm', 'pharm', '1988-01-01', 'female', 25896963, '0723231983', 'Lavington', 'robina@gmail.com', 'pharm', '597fa470c4b7c0f0ca8de10c2ede4d90', 'Active', 'Pharmacist'),
(69, 'reception', 'reception', 'reception', '1996-01-10', 'male', 29968615, '0721862243', 'Imara', 'rasangafiona@gmail.com', 'reception', '1da95b279fc0d21024cece2c68a4c200', 'Active', 'Reception');

-- --------------------------------------------------------

--
-- Table structure for table `items_movement`
--

CREATE TABLE IF NOT EXISTS `items_movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `date_of_issue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reference` varchar(500) NOT NULL,
  `exp_date` date NOT NULL,
  `opening_bal` int(11) NOT NULL,
  `issues` int(11) NOT NULL,
  `closing_bal` int(11) NOT NULL,
  `issuing_officer` int(11) NOT NULL,
  `service_point` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `items_movement`
--

INSERT INTO `items_movement` (`id`, `item_id`, `date_of_issue`, `reference`, `exp_date`, `opening_bal`, `issues`, `closing_bal`, `issuing_officer`, `service_point`) VALUES
(11, 35, '2013-09-04 18:40:12', 'INTERNAL', '0000-00-00', 680, 10, 670, 68, ''),
(12, 38, '2013-09-04 18:41:13', 'INTERNAL', '0000-00-00', 68, 7, 61, 68, ''),
(13, 39, '2013-09-04 18:44:39', 'INTERNAL', '0000-00-00', 11, 11, 0, 68, ''),
(14, 40, '2013-09-04 18:44:51', 'INTERNAL', '0000-00-00', 1000, 100, 900, 68, ''),
(15, 41, '2013-09-04 18:50:28', 'INTERNAL', '0000-00-00', 0, 10, 990, 68, ''),
(16, 37, '2013-09-04 18:58:33', 'INTERNAL', '0000-00-00', 200, 14, 186, 68, ''),
(17, 36, '2013-09-04 19:01:38', 'INTERNAL', '0000-00-00', 1000, 100, 900, 68, 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `labwalkin`
--

CREATE TABLE IF NOT EXISTS `labwalkin` (
  `name` varchar(255) NOT NULL,
  `lab_test` varchar(300) NOT NULL,
  `results` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE IF NOT EXISTS `lab_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `labtechid` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `test` varchar(500) NOT NULL,
  `result` varchar(1000) NOT NULL,
  `check` enum('1','0') NOT NULL,
  `paymentid` int(11) NOT NULL,
  `paid` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `labcheckID` (`labtechid`),
  KEY `test` (`test`),
  KEY `visitid` (`visitid`),
  KEY `doc_id` (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `labtechid`, `doc_id`, `visitid`, `test`, `result`, `check`, `paymentid`, `paid`) VALUES
(1, 0, 58, 2, 'Hepatitis B', '', '1', 1, 'yes'),
(2, 0, 58, 2, 'Full Blood Test', '', '1', 0, 'no'),
(3, 55, 58, 3, 'Full Blood Test', 'wbc  5.2,hb 12.8', '0', 1, 'yes'),
(4, 55, 58, 3, 'Full Blood Test', 'wbc  5.2,hb 12.8', '0', 1, 'yes'),
(5, 55, 58, 4, 'Full Blood Test', 'hb  10.2,wbc  9.6plt  100', '0', 1, 'yes'),
(6, 55, 58, 4, 'Full Blood Test', 'hb  10.2,wbc  9.6plt  100', '0', 0, 'no'),
(7, 55, 60, 7, 'Full Blood Test', 'wbc  6.34,gra 4062,rbc 3.80,hb 12.5,plts 493,  urinalysis, pale amber,ph  7,s.g 7,leukocytes  - trace,othere - nil,Microscopy,few  bacteria  rods seen', '0', 1, 'yes'),
(8, 55, 60, 7, 'Blood Sugar', 'rbs 5..0 mmols', '0', 1, 'yes'),
(9, 55, 63, 8, 'rheumatoid factor', 'RF -  NON REACTIVE', '0', 1, 'yes'),
(10, 55, 60, 9, 'Full Blood Test', 'WBC  7.10,GRA 5.26,GRA% 7401,RBC 3.45,HB 8.4,HCT 0.23,MCHC 37.1,PLT 185', '0', 1, 'yes'),
(11, 55, 62, 24, 'Full Blood Test', 'WBC  8.87,GRA 6.73,GRA% 75.9,HB  9.9,PLT  294', '0', 1, 'yes'),
(12, 55, 58, 23, 'Blood Sugar', 'rbs  4.7 mmols/l', '0', 1, 'yes'),
(13, 55, 58, 23, 'urinalysis', 'pale  amber,ph 6.0,sS.G 1.010,Leukocytes   +,proteins  -nil,glucose - nil,others  - nil', '0', 1, 'yes'),
(14, 55, 58, 35, 'Full Blood Test', 'wbc 5.93,gra% 40.5,gra  2.40,rbc 4.84,hb 14.8,mcv 88,mchc 34.7,plt 236', '0', 1, 'yes'),
(15, 55, 58, 35, 'rheumatoid factor', 'RF - non- reactive', '0', 1, 'yes'),
(16, 55, 63, 69, 'urinalysis', 'clear  amber,PH 7,S.G 1.025,PROTEINS  - NIL,GLUCOSE - NIL,OTHERS  NIL,,MICROSCOPY,NO pus  cells  seen,no  bacteria  rods, few  epithelial cells', '0', 1, 'yes'),
(17, 55, 58, 64, 'Hepatitis B', 'negative', '0', 1, 'yes'),
(18, 55, 58, 64, 'Blood Sugar', '4.3 mmols/l', '0', 1, 'yes'),
(19, 0, 58, 64, 'HIV test', '', '1', 1, 'yes'),
(20, 55, 58, 64, 'urinalysis', 'PALE  AMBER,Ph  6,S>G  1.025,proteins - nil,glucose - nil,Blood   - + ( haemolysed), ,Microscopy, NAD', '0', 1, 'yes'),
(21, 55, 62, 57, 'Blood Sugar', '4.1mmols/l', '0', 1, 'yes'),
(22, 55, 62, 57, 'urinalysis', 'turbid  amber,ph - 6,S.G 1.020,blood - +++(haemolysed),glucose  - nill,others  Nil,Microscopy,few  bacteria  rods,2-4 pus cells', '0', 1, 'yes'),
(23, 55, 62, 61, 'Pregnancy test', 'PDT - NEGATIVE', '0', 1, 'yes'),
(24, 55, 58, 81, 'Full Blood Test', 'WBC  6.46,LYM 2.21,MON 0.30,GRA 3.96,LYM% 34.2,RBC 4.38,HGB 14.1,PLT 303,MCHC 35.4,MCH  32.2 ', '0', 1, 'yes'),
(25, 55, 58, 81, 'Stool routine', 'FORMED  BROWN,no ova/cyst seen,', '0', 1, 'yes'),
(26, 55, 58, 81, 'h.pylori', 'H..PYLORI AB - NEGATIVE', '0', 1, 'yes'),
(27, 55, 62, 93, 'Full Blood Test', 'wbc 7.61,lym 3.18,mon 0.24,gra 4019,lym5 41.8,MON% 3.1,GRA% 55.1,RBC 3.83,HB 11.8,HCT 0.33,MCHC 36.1,PLT 245,', '0', 1, 'yes'),
(28, 0, 61, 99, 'Full Blood Test', '', '1', 0, 'no'),
(29, 0, 61, 99, 'Hepatitis B', '', '1', 0, 'no'),
(30, 55, 64, 74, 'Stool routine', 'FORMED  BROWN,NO  ova  or  cyst  seen', '0', 1, 'yes'),
(31, 0, 64, 95, 'HIV test', '', '1', 0, 'no'),
(32, 55, 64, 95, 'Stool routine', 'formed  brown,  cysts of G.lamblia', '0', 1, 'yes'),
(33, 55, 64, 94, 'Full Blood Test', 'wbc   6.68,lym  2.79,mon 0.19,lym% 41.7,gra % 55.4,,rbc 4.91,hb 14.1,hct 0.41,mchc  34.8,plt 315', '0', 1, 'yes'),
(34, 55, 64, 94, 'Blood Sugar', ' mmols/lrbs', '0', 1, 'yes'),
(35, 0, 64, 94, 'HIV test', '', '1', 0, 'no'),
(36, 0, 64, 94, 'urinalysis', '', '1', 1, 'yes'),
(37, 55, 58, 119, 'Full Blood Test', 'WBC  8.36,LYM  3.12,MON  0.16, LYM%  37.3,MON %  1.9,  GRA%  60.8,,RBC  4.88,HB  15.3,HCT  0.14,MCH  31.4,MCHC  37.1,,PLT  760', '0', 1, 'yes'),
(38, 0, 58, 119, 'Biochemistry', '', '1', 0, 'no'),
(39, 55, 58, 119, 'Blood Sugar', 'rbs  5.7 mmols/l', '0', 1, 'yes'),
(40, 55, 58, 119, 'rheumatoid factor', 'RF  -  NON  REACTIVE', '0', 1, 'yes'),
(41, 0, 58, 119, 'HIV test', '', '1', 0, 'no'),
(42, 0, 58, 119, 'Lipid level assays', '', '1', 0, 'no'),
(43, 55, 58, 119, 'Asot test', 'ASOT - NEGATIVE,', '0', 1, 'yes'),
(44, 55, 58, 119, 'vdrl', 'VDRL- NEGATIVE', '0', 1, 'yes'),
(45, 55, 58, 119, 'urinalysis', 'pale amber,ph  -6.0,SG  - 1.030,PROTEINS  - niL,GLUCOSE  - nil,OTHERS _ nil,,MICROSCPY,, No pus  cells/yeast cells  seen', '0', 1, 'yes'),
(46, 55, 58, 120, 'Full Blood Test', 'WBC - 8.08,LYM  - 1.64,MON  0.06,GRA  6.38,LYM%  20.2,MON% 0.7,GRA %  79,,RBC 4.76,HB 15.2,HCT 0.41,MCV 85,MCH 32.0,MCHC 37.6,PLT 272', '0', 1, 'yes'),
(47, 55, 58, 120, 'Full Blood Test', 'WBC - 8.08,LYM  - 1.64,MON  0.06,GRA  6.38,LYM%  20.2,MON% 0.7,GRA %  79,,RBC 4.76,HB 15.2,HCT 0.41,MCV 85,MCH 32.0,MCHC 37.6,PLT 272', '0', 0, 'no'),
(48, 55, 58, 120, 'Full Blood Test', 'WBC - 8.08,LYM  - 1.64,MON  0.06,GRA  6.38,LYM%  20.2,MON% 0.7,GRA %  79,,RBC 4.76,HB 15.2,HCT 0.41,MCV 85,MCH 32.0,MCHC 37.6,PLT 272', '0', 0, 'no'),
(49, 0, 58, 123, 'Malaria Test', '', '1', 0, 'no'),
(50, 0, 58, 123, 'Stool salmonella', '', '1', 0, 'no'),
(51, 55, 58, 124, 'ANC Profile', 'hb -13.1,vdrl -negative,group -O positive,URINALYSIS,pale amber,ph 6,s.g  1.025,leukocytes - nil,proteins - nil,others  - nil,  microcopy, NAD,,HGM,wbc  6.14,lyp 1.33,mon 0.23,lyp% 21.7,mon% 3.7,gra% 74.6,,rbc  4.24,hgb  13.1,hct  0.36,mcv  31.0,mchc  36.6,plt  400,,', '0', 0, 'no'),
(52, 55, 58, 124, 'ANC Profile', 'hb -13.1,vdrl -negative,group -O positive,URINALYSIS,pale amber,ph 6,s.g  1.025,leukocytes - nil,proteins - nil,others  - nil,  microcopy, NAD,,HGM,wbc  6.14,lyp 1.33,mon 0.23,lyp% 21.7,mon% 3.7,gra% 74.6,,rbc  4.24,hgb  13.1,hct  0.36,mcv  31.0,mchc  36.6,plt  400,,', '0', 1, 'yes'),
(53, 55, 58, 125, 'Malaria Test', 'bs  - no mps seen', '0', 1, 'yes'),
(54, 55, 58, 125, 'Full Blood Test', 'wbc  -7.78,lym 0.34,mon  0.02,gra  7.43,lym% 4.3,mon % 0.2,gra %  95.5 9 high,,rbc 4.61,hgb 15.4, hct 0.45,mcv  90,plt  513,', '0', 1, 'yes'),
(55, 55, 58, 126, 'Full Blood Test', 'hb 13.6,gra% 89.6', '0', 1, 'yes'),
(56, 55, 58, 127, 'Full Blood Test', 'wbc - 6.82,lym 1.45,gra 5.19,ly%  21.2,,hb  16.3,plt 181', '0', 1, 'yes'),
(57, 0, 58, 128, 'Full Blood Test', '', '1', 0, 'no'),
(58, 0, 58, 128, 'Stool salmonella', '', '1', 0, 'no'),
(59, 0, 58, 128, 'h.pylori', '', '1', 0, 'no'),
(60, 0, 58, 128, 'urinalysis', '', '1', 0, 'no'),
(61, 0, 58, 132, 'Malaria Test', '', '1', 0, 'no'),
(62, 0, 58, 132, 'Full Blood Test', '', '1', 0, 'no'),
(63, 0, 58, 132, 'Biochemistry', '', '1', 0, 'no'),
(64, 0, 58, 132, 'Stool routine', '', '1', 0, 'no'),
(65, 0, 58, 132, 'Stool salmonella', '', '1', 0, 'no'),
(66, 0, 58, 132, 'urinalysis', '', '1', 0, 'no'),
(67, 0, 58, 139, 'Malaria Test', '', '1', 1, 'yes'),
(68, 0, 58, 139, 'Full Blood Test', '', '1', 1, 'yes'),
(69, 61, 61, 140, 'Full Blood Test', 'none', '0', 1, 'yes'),
(70, 61, 61, 140, 'Blood Sugar', 'none', '0', 1, 'yes'),
(71, 61, 61, 145, 'HIV test', 'hhhf', '0', 1, 'yes'),
(72, 61, 61, 147, 'Blood Sugar', 'hfgtf', '0', 1, 'yes'),
(73, 61, 61, 153, 'Malaria Test', 'hdfdh', '0', 1, 'yes'),
(74, 0, 61, 153, 'Biochemistry', '', '1', 1, 'yes'),
(75, 0, 61, 153, 'HB1ac Assay', '', '1', 1, 'yes'),
(76, 0, 61, 154, 'Biochemistry', '', '1', 1, 'yes'),
(77, 0, 61, 156, 'Hepatitis B', '', '1', 1, 'yes'),
(78, 0, 61, 156, 'HB1ac Assay', '', '1', 1, 'yes'),
(79, 0, 61, 156, 'Stool routine', '', '1', 1, 'yes'),
(80, 0, 61, 156, 'Stool salmonella', '', '1', 1, 'yes'),
(81, 0, 66, 160, 'Malaria Test', '', '1', 0, 'no'),
(82, 0, 66, 160, 'Hepatitis B', '', '1', 0, 'no'),
(83, 67, 66, 161, 'Malaria Test', 'positive', '0', 1, 'yes'),
(84, 0, 66, 161, 'Biochemistry', '', '1', 1, 'yes'),
(85, 67, 66, 161, 'Hepatitis B', 'none', '0', 1, 'yes'),
(86, 0, 66, 161, 'HIV test', '', '1', 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE IF NOT EXISTS `login_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empid` int(11) NOT NULL,
  `Username` varchar(300) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `empid`, `Username`, `login_time`) VALUES
(29, 52, 'Jemimah', '2013-08-23 12:42:48'),
(30, 61, 'Rasanga', '2013-08-24 15:01:12'),
(31, 61, 'Rasanga', '2013-08-27 14:00:32'),
(32, 61, 'Rasanga', '2013-08-28 06:00:22'),
(33, 61, 'Rasanga', '2013-08-28 17:09:50'),
(34, 61, 'Rasanga', '2013-08-29 07:27:06'),
(35, 61, 'Rasanga', '2013-08-29 07:30:46'),
(36, 61, 'Rasanga', '2013-08-29 08:52:36'),
(37, 61, 'Rasanga', '2013-08-29 08:57:06'),
(38, 61, 'Rasanga', '2013-08-29 09:05:34'),
(39, 61, 'Rasanga', '2013-08-29 09:12:07'),
(40, 61, 'Rasanga', '2013-08-29 09:32:58'),
(41, 61, 'Rasanga', '2013-08-29 14:15:04'),
(42, 61, 'Rasanga', '2013-08-29 19:55:31'),
(43, 61, 'Rasanga', '2013-08-29 20:19:08'),
(44, 61, 'Rasanga', '2013-08-29 20:36:46'),
(45, 61, 'Rasanga', '2013-08-30 02:54:21'),
(46, 61, 'Rasanga', '2013-08-30 05:32:46'),
(47, 61, 'Rasanga', '2013-08-30 07:03:15'),
(48, 61, 'Rasanga', '2013-08-30 11:15:07'),
(49, 61, 'Rasanga', '2013-08-31 04:21:45'),
(50, 61, 'Rasanga', '2013-08-31 18:39:06'),
(51, 61, 'Rasanga', '2013-09-01 05:15:16'),
(52, 61, 'Rasanga', '2013-09-02 17:42:22'),
(53, 61, 'Rasanga', '2013-09-04 11:54:33'),
(54, 61, 'Rasanga', '2013-09-04 17:20:22'),
(55, 65, 'nurse', '2013-09-04 18:22:31'),
(56, 65, 'nurse', '2013-09-04 18:33:44'),
(57, 68, 'pharm', '2013-09-04 18:34:40'),
(58, 65, 'nurse', '2013-09-04 18:45:15'),
(59, 68, 'pharm', '2013-09-04 18:50:03'),
(60, 65, 'nurse', '2013-09-04 19:02:27'),
(61, 65, 'nurse', '2013-09-05 07:54:53'),
(62, 65, 'nurse', '2013-09-05 07:54:57'),
(63, 65, 'nurse', '2013-09-05 08:21:50'),
(64, 69, 'reception', '2013-09-05 08:23:30'),
(65, 66, 'doctor', '2013-09-05 08:25:07'),
(66, 68, 'pharm', '2013-09-05 09:02:25'),
(67, 69, 'reception', '2013-09-05 09:02:58'),
(68, 68, 'pharm', '2013-09-07 07:38:59'),
(69, 65, 'nurse', '2013-09-09 05:29:41'),
(70, 66, 'doctor', '2013-09-09 05:36:34'),
(71, 67, 'lab', '2013-09-09 05:46:09'),
(72, 67, 'lab', '2013-09-09 05:48:26'),
(73, 68, 'pharm', '2013-09-09 05:51:02'),
(74, 69, 'reception', '2013-09-09 05:56:08'),
(75, 66, 'doctor', '2013-09-11 10:47:25'),
(76, 69, 'reception', '2013-09-11 16:40:55'),
(77, 66, 'doctor', '2013-09-11 16:57:38'),
(78, 67, 'lab', '2013-09-11 17:02:10'),
(79, 69, 'reception', '2013-09-11 17:10:11'),
(80, 65, 'nurse', '2013-09-11 17:10:41'),
(81, 66, 'doctor', '2013-09-11 17:11:49'),
(82, 67, 'lab', '2013-09-11 17:15:39'),
(83, 66, 'doctor', '2013-09-11 17:31:05'),
(84, 68, 'pharm', '2013-09-11 17:33:52'),
(85, 68, 'pharm', '2013-09-13 12:04:14'),
(86, 69, 'reception', '2013-09-14 08:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `code` varchar(6) DEFAULT NULL,
  `Medicine_name` varchar(255) DEFAULT NULL,
  `notes` varchar(57) DEFAULT NULL,
  `strength` varchar(255) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `packs` int(11) NOT NULL,
  `price` varchar(5) DEFAULT NULL,
  `buying_price` int(11) NOT NULL,
  `supplier` enum('GOK','Meds','Kemsa') NOT NULL,
  `stock_in_hand` int(60) NOT NULL,
  `min_amount` int(60) NOT NULL,
  `exp_date` date NOT NULL,
  `batch_no` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`code`, `Medicine_name`, `notes`, `strength`, `units`, `packs`, `price`, `buying_price`, `supplier`, `stock_in_hand`, `min_amount`, `exp_date`, `batch_no`, `id`) VALUES
('DE456', 'Abacavir Sulfate  ', 'Keep Refrigirated', '400 gms', '1', 10, '100', 100, 'Meds', 10, 5, '2013-08-20', 'DE4RR', 1),
('DE4566', 'Acarbose ', 'Keep Refrigirated', '5ml', '1', 10, '100', 100, 'Meds', 2, 3, '2013-08-13', 'B34', 2),
('ACY00', 'Asprin Tablets', 'Store in a cool dry place', '250 gms', '1000', 10, '20', 100, 'Kemsa', 3, 3, '2013-08-06', 'SS', 3);

-- --------------------------------------------------------

--
-- Table structure for table `none_meds`
--

CREATE TABLE IF NOT EXISTS `none_meds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_no` varchar(500) NOT NULL,
  `name` varchar(700) NOT NULL,
  `units` varchar(500) NOT NULL,
  `pack_size` int(11) NOT NULL,
  `packs` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `supplier` enum('GOK','Meds','Kemsa') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `none_meds`
--

INSERT INTO `none_meds` (`id`, `batch_no`, `name`, `units`, `pack_size`, `packs`, `quantity`, `available_quantity`, `exp_date`, `price`, `supplier`) VALUES
(1, 'DE56', 'Acyclovir', 'tablets', 20, 10, 200, 186, '2013-08-14', 10, 'Kemsa'),
(2, 'FT6', 'Inte-Uterine Devices', '', 30, 30, 900, -10, '2013-08-23', 200, 'Meds'),
(3, 'TY688', 'Implants', '', 10, 100, 1000, 900, '2013-08-13', 100, 'GOK'),
(4, 'DE4443', 'P2', 'Tablets', 34, 2, 68, 98, '2013-08-12', 10, 'Meds');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `type`, `cost`) VALUES
(1, 'ante-natal care', 'well person care', 130),
(2, 'post-natal services', 'well person care', 130),
(3, 'Hypertension', 'chronic person care', 1600),
(4, 'Diabetes', 'chronic person care', 1600),
(5, 'Minor Infections', NULL, 1000),
(6, 'Serious Infections', NULL, 2500),
(7, 'Minor surgical Interventions', NULL, 1300),
(8, 'Orthopedic Inteventions', NULL, 1300),
(9, 'consultation', 'consultation', 300);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationalid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `maritalstatus` enum('Single','Married','Divorced','Widowed','N/A') NOT NULL,
  `kinname` varchar(50) NOT NULL,
  `kinphone` int(11) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `residence` varchar(255) NOT NULL,
  `employer` varchar(500) NOT NULL,
  `employmentstatus` enum('employed','not employed') NOT NULL,
  `status` enum('Active','In-active') NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kinrelation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fname` (`fname`),
  KEY `sname` (`sname`),
  KEY `lname` (`lname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `nationalid`, `fname`, `sname`, `lname`, `dob`, `address`, `phone`, `email`, `maritalstatus`, `kinname`, `kinphone`, `sex`, `residence`, `employer`, `employmentstatus`, `status`, `regdate`, `kinrelation`) VALUES
(1, 9671445, 'simon', 'Ndiriru', 'Ndungu', '0000-00-00', 'utawala', 722832575, '', 'Married', '', 2147483647, 'Male', '', '', 'employed', 'Active', '2013-07-03 16:26:42', 'wife'),
(2, 2916281, 'florence', 'kariuki', 'njeri', '0000-00-00', 'thome 1', 722752689, '', 'Married', '', 720715102, 'Female', '', '', 'employed', 'Active', '2013-07-03 16:34:45', 'daughter'),
(3, 223333333, 'evelyn', 'hudson', 'mwende', '0000-00-00', 'zimmerman', 704350586, '', 'Married', 'musyoki', 720898757, 'Female', '', '', 'employed', 'Active', '2013-07-03 16:39:12', 'husband'),
(4, 234569640, 'esther', 'maweu', 'mwikali', '0000-00-00', 'zimmerman', 707205050, '', 'Single', 'nduku', 700002256, 'Female', '', '', 'employed', 'Active', '2013-07-03 16:43:41', 'mother'),
(5, 23867431, 'josphat', 'mwangi', 'wachira', '0000-00-00', 'mirema', 723336581, '', 'Married', 'muriuki', 710433898, 'Male', '', '', 'employed', 'Active', '2013-07-03 16:46:48', 'brother'),
(6, 310508362, 'joseph', 'john', 'kioko', '0000-00-00', 'kasarani', 737679872, '', 'Married', 'musau', 725656770, 'Male', '', '', 'employed', 'Active', '2013-07-03 17:30:35', 'brother'),
(7, 28003256, 'elizabeth', 'muambi', 'nditi', '0000-00-00', 'mathare north', 712393489, '', 'Single', 'muambi', 710612339, 'Female', '', '', 'employed', 'Active', '2013-07-03 17:32:54', 'mother'),
(8, 28275362, 'daniel', 'ombwi', 'amenya', '0000-00-00', 'githurai', 710626745, '', 'Single', '', 710626745, 'Male', '', '', 'employed', 'Active', '2013-07-03 17:36:34', 'sister'),
(9, 24723840, 'tony', 'omilla', 'omilla', '0000-00-00', 'githurai', 705966399, '', 'Single', '', 729175292, 'Male', '', '', 'employed', 'Active', '2013-07-03 17:38:53', 'sister'),
(10, 26436539, 'Wanjiku', 'Josephine ', 'Marima', '1988-06-01', 'Githurai', 725377281, '', 'Single', 'Brother', 718256466, 'Female', '', '', 'employed', 'Active', '2013-07-09 13:15:13', 'Brother'),
(11, 26436539, 'Wanjiku', 'Josephine ', 'Marima', '1988-06-01', 'Githurai', 725377281, '', 'Single', 'Brother', 718256466, 'Female', '', '', 'employed', 'Active', '2013-07-09 13:25:21', 'Brother'),
(12, 23792894, 'eugene', 'korongo', 'eugene', '0000-00-00', 'kasarani', 724311727, 'ekorongo@yahoo.com', 'Single', 'matanga', 720870638, 'Male', '', '', 'employed', 'Active', '2013-07-11 15:45:37', 'sister'),
(13, 7557470, 'Mwangi', 'Anthony ', 'Kamau', '1980-01-03', 'Roysambu', 733728027, '', 'Married', 'Wife', 733728027, 'Male', '', '', 'employed', 'Active', '2013-07-25 14:54:18', 'Wife'),
(14, 20548365, 'Erima', 'Lyndon', 'Marani', '1977-09-08', 'South B', 738173707, '', 'Married', 'Jura', 726533041, 'Male', '', '', 'employed', 'Active', '2013-07-26 09:09:29', 'Wife'),
(15, 0, 'amyrose', 'kiende', 'opiyo', '1971-09-20', '58904-00200 nairobi', 723539675, '', 'Married', 'pascal martin', 723539675, 'Female', 'langata', '', 'employed', 'In-active', '0000-00-00 00:00:00', ''),
(16, 23947758, 'Edwin', 'Buguru', 'Thuo', '1985-05-02', 'Nairobi', 787771771, '', 'Married', 'Wangari', 718256466, 'Male', '', '', 'employed', 'Active', '2013-07-26 11:27:07', 'son'),
(17, 2916281, 'Njeri', 'Florence', 'Kariuki', '1963-01-01', 'thome', 722752689, '', 'Married', 'Daughter', 720715102, 'Female', '', '', 'employed', 'Active', '2013-07-26 12:05:59', 'Daughter'),
(18, 12345678, 'Esther', 'Esther', 'Nyambura', '1979-07-01', 'Kamaye', 700000000, '', 'Single', 'Esther', 70000000, 'Female', '', '', 'employed', 'Active', '2013-07-27 08:17:36', 'Sister'),
(19, 24216241, 'Judy', 'Karongo', 'Muthoni', '1985-02-25', 'Githurai 44', 721862243, '', 'Married', 'Ngaruiya', 725222092, 'Female', '', '', 'employed', 'Active', '2013-07-27 08:19:54', 'Husband'),
(20, 12760554, 'Hannah', 'Nduati', 'Kariuki', '1976-02-02', 'Githurai 44', 727884006, '', '', ' Nduati', 702791409, 'Female', '', '', 'employed', 'Active', '2013-07-27 08:22:28', 'Son'),
(21, 21402790, 'Wairimu', 'Esther', 'Wathu', '1978-01-02', 'Githurai 44', 722494655, '', 'Married', ' Mutuku', 722219420, 'Female', '', '', 'employed', 'Active', '2013-07-27 08:41:39', 'Husband'),
(22, 24169413, 'Lydia', 'Wahito', 'Kariuki', '1980-07-01', 'Kahawa west', 726556492, '', 'Married', 'Kariuki', 773632308, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:01:33', 'Husband'),
(23, 5781326, 'Joyce', 'Njuguna', 'Wanjiku', '1966-07-01', 'Githurai 44', 712731603, '', 'Married', 'Njeru', 723858334, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:12:22', 'Husband'),
(24, 28685960, 'Mukami ', 'Bibian', 'Ireri', '1989-02-22', 'Kahawa West', 701248713, '', 'Married', 'Mugambi', 712329790, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:12:23', 'Husband'),
(25, 12345678, 'Kangethe', 'Sherlin', 'Nyambura', '2010-04-25', 'Githurai 44', 714523528, '', 'Single', 'Kangethe', 720964478, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:17:01', 'Dad'),
(26, 12345678, 'Wanjiru', 'Mitchelle', 'Kangethe', '2006-02-18', 'Githurai 44', 714523528, '', 'Single', 'Kangethe', 720964478, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:19:16', 'Dad'),
(27, 13841866, 'Wanjiku', 'Jane', 'Wangechi', '1978-06-03', 'Kahawa west', 705902521, '', 'Married', 'Wachuka', 2147483647, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:22:42', 'Sister'),
(28, 12345678, 'Mwaniki', 'Caleb', 'Mwaniki', '2011-01-13', 'Kahawa West', 700000000, '', '', 'Wahiro', 726556482, 'Male', '', '', 'employed', 'Active', '2013-07-27 09:23:36', 'Mother'),
(29, 22860819, 'Mwachala', 'Chrisropher ', 'Mwachala', '1981-12-16', 'Zimmerman', 704137468, '', 'Married', 'Wanja ', 728652700, 'Male', '', '', 'employed', 'Active', '2013-07-27 09:30:32', 'Wife'),
(30, 12345678, 'Kawira', 'Elljoy', 'Mutegu', '1996-07-01', 'Kahawa West', 717845343, '', 'Single', 'Murugi', 724908379, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:33:59', 'Mother'),
(31, 27182261, 'Wanjohi ', 'Brian', 'Mwangi', '2004-07-01', 'Nairobi', 717381647, '', 'Married', 'Wanjohi', 725752171, 'Male', '', '', 'employed', 'Active', '2013-07-27 12:08:53', 'Husband'),
(32, 27182261, 'Kigithengi', 'Markcarlton', 'Wanjohi', '2010-05-11', 'Githurai', 2147483647, '', 'Single', 'Wanjohi', 725752171, 'Male', '', '', 'employed', 'Active', '2013-07-27 09:43:34', 'Husband'),
(33, 22860819, 'Luise', 'Ngaruiya', 'Karongo', '2009-08-21', 'Githurai', 721862243, '', 'Married', 'Ngarwiya', 725222092, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:46:13', 'Husband'),
(34, 28685960, 'Dorcas', 'Mwaura', 'Wangari', '1977-04-09', 'Githurai', 728558295, '', 'Married', 'Kimani', 724293967, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:48:35', 'Husband'),
(35, 28167982, 'Nancy', 'Kiiru', 'Wambui', '1995-12-06', 'Kahawa West', 721374151, '', 'Married', 'Muturi', 706099329, 'Female', '', '', 'employed', 'Active', '2013-07-27 09:58:06', 'Husband'),
(36, 29086968, 'Lilian', 'Baraza', 'Akumu', '1978-11-16', 'Ngomongo', 708604202, '', 'Single', 'Baraza', 70280371, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:04:08', 'Father'),
(37, 14607302, 'Caroline', 'Muriuki', 'Muthoni', '1977-05-25', 'Githurai', 714532528, '', 'Married', 'Kangethe', 720964478, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:10:35', 'Husband'),
(38, 26436539, 'Esther', 'Okachi', 'Chanzu', '1992-10-20', 'Ksarani', 705968238, '', 'Married', 'Okachi', 701251331, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:14:59', 'Mother'),
(39, 7277286, 'Dorothy', 'Githui', 'Ngendo', '1963-04-11', 'Rongai', 728607781, '', 'Married', 'Githui', 722447470, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:19:48', 'Spouse'),
(40, 12345678, 'Jimnah', 'Okachi', 'Lukoye', '2006-01-01', 'Kasarani', 733728027, '', 'Married', 'Okachi', 705968238, 'Male', '', '', 'employed', 'Active', '2013-07-27 10:19:52', 'Mother'),
(41, 28167982, 'Nyaera', 'Ratemo', 'Rachel', '1989-05-25', 'Kahawa West', 70373729, '', 'Married', 'Maranga', 720704516, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:22:19', 'Husband'),
(42, 29812335, 'Nambuya', 'Esther', 'Mayeku', '1985-07-20', 'Langata', 720230512, '', 'Single', 'Mayeku', 729068914, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:23:38', 'Mother'),
(43, 12345678, 'Jotham', 'Mbae', 'Mutembei', '1986-11-11', 'Kahawa', 728101532, '', 'Single', 'Njeri', 733728027, 'Male', '', '', 'employed', 'Active', '2013-07-27 10:24:55', 'Mother'),
(44, 12345678, 'Nalikiso', 'Karani', 'Kagiri', '1975-10-16', 'Githurai 44', 724739106, '', 'Married', 'Muthoni', 733728027, 'Male', '', '', 'employed', 'Active', '2013-07-27 10:27:24', 'Wife'),
(45, 11791958, 'Musembi', 'Lucy', 'Githini', '1973-12-08', 'Ruai', 722846076, '', 'Married', 'Musembi', 728009568, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:27:40', 'Husband'),
(46, 14651493, 'Janet', 'Karanja', 'Wanjiru', '1977-01-13', 'Githurai 44', 722136670, '', 'Married', 'Nduati', 721902694, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:29:46', 'Husband'),
(47, 1859760, 'Nduta', 'Teresia', 'Chege', '1948-07-05', 'Kiamumbi', 725568563, '', 'Married', 'Manyina', 722252036, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:31:23', 'Daughter'),
(48, 12345678, 'Diana', 'Mwangi', 'Wairimu', '2000-09-03', 'Githurai 44', 715807861, '', 'Married', 'Mwangi', 721166103, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:31:32', 'Husband'),
(49, 1234561, 'Mumbi', 'Ann', 'Mwangi', '1985-08-03', 'Githurai44', 715807861, '', 'Married', 'Mwangi', 721166103, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:35:32', 'Husband'),
(50, 12345678, 'Samson', 'Mwangi', 'Gitau', '2012-01-03', 'Githurai 44', 715807861, '', 'Married', 'George', 721166103, 'Male', '', '', 'employed', 'Active', '2013-07-27 10:37:31', 'Husband'),
(51, 29027696, 'Mumo', 'Margdalen', 'Ndome', '1983-09-11', 'Githurai44', 727760310, '', 'Married', 'Njoroge', 727882101, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:40:17', 'Husband'),
(52, 11391189, 'Tabitha', 'Kiburi', 'Nyambura', '1966-07-01', 'Ruai', 722846076, '', 'Married', 'Musembi', 728009568, 'Female', 'Githurai 44', '', 'employed', 'Active', '2013-07-27 10:42:57', 'Husband'),
(53, 30271825, 'Mueni', 'Agnes ', 'Ndome', '1993-06-15', 'Githurai44', 710849455, '', 'Single', 'Mwangangi', 726366887, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:44:38', 'Father'),
(54, 12345678, 'John', 'Kithua', 'Mwangi', '2011-01-04', 'Githurai 44', 715807861, '', 'Married', 'Mwangi', 721166103, 'Male', '', '', 'employed', 'Active', '2013-07-27 10:45:38', 'Husband'),
(55, 12345678, 'Teresiah', 'Kariuki', 'Wacuke', '1944-07-01', 'Kiamumbi', 729826833, '', 'Married', 'Kariuki', 733728027, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:47:43', 'Husband'),
(56, 29027696, 'Nyathira', 'Marion', 'Njoroge', '2013-05-19', 'Githurai44', 727760310, '', 'Single', 'Njoroge', 2147483647, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:49:19', 'Mother'),
(57, 12345678, 'Jacquline', 'Okwaro', 'Waithera', '1989-12-28', 'Githurai 44', 714979645, '', 'Married', 'Okwaro', 727412881, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:52:25', 'Husband'),
(58, 9393862, 'Lucy', 'Kiarie', 'Waithira', '1986-05-01', 'Kahawa West', 714857175, '', 'Single', '', 722103677, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:54:44', 'Brother'),
(59, 10867940, 'Wacho', 'Jennifer', 'Kinuthia', '1970-07-06', 'Mwiki', 71760096, '', 'Married', 'Kinuthia', 725811603, 'Female', '', '', 'employed', 'Active', '2013-07-27 10:55:13', 'Husband'),
(60, 12345678, 'Mwangi', 'Travis', 'Rukwako', '2013-01-09', 'Githurai 44', 714979654, '', 'Married', 'Rukwako', 727413881, 'Male', '', '', 'employed', 'Active', '2013-07-27 11:00:08', 'Husband'),
(61, 27790502, 'Trizah', 'Wambui', 'Mwangi', '1990-05-24', 'Githurai 44', 723053134, '', 'Single', 'Mwangi', 73739111, 'Female', '', '', 'employed', 'Active', '2013-07-27 11:01:47', 'Sister'),
(62, 12345678, 'Nyaboke', 'Everlyne', 'Sotire', '1984-11-01', 'Githurai 44', 723032332, '', 'Married', 'Odari', 715155015, 'Female', '', '', 'employed', 'Active', '2013-07-27 11:02:46', 'Husband'),
(63, 23266281, 'Benard', 'Gichohi', 'Mainq', '1982-04-14', 'Githurai 44', 724882659, '', 'Married', 'Kariuki', 702790802, 'Male', '', '', 'employed', 'Active', '2013-07-27 11:04:27', 'Wife'),
(64, 12345678, 'Wangui', 'MAureen', 'Wanjohi', '2007-08-16', 'Githurai 44', 717381647, '', 'Single', 'Mumbi', 717381647, 'Female', '', '', 'employed', 'Active', '2013-07-27 11:59:18', 'Mother'),
(65, 9620335, 'Ayako', 'Sabrina', 'Mbevi', '1979-12-11', 'Githurai44', 703439660, '', 'Widowed', 'Obanda', 701188732, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:10:12', 'Brother'),
(66, 9620335, 'Mkongolo', 'Michael', 'Mbevi', '2011-05-13', 'githurai 44', 703439660, '', 'Single', 'Ayako', 701188732, 'Male', '', '', 'employed', 'Active', '2013-07-27 12:11:56', 'Mother'),
(67, 27664982, 'Daniel', 'kithusi', 'Makindi', '2011-05-26', 'Githurai 44', 2147483647, '', 'Single', 'Kavinya', 2147483647, 'Male', '', '', 'employed', 'Active', '2013-07-27 12:12:00', 'Mother'),
(68, 25663419, 'Mulati', 'Linet', 'Nekesa', '1986-09-23', 'Kahawa Sukari', 722765937, '', 'Married', 'Otieno', 720630093, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:52:03', 'husband'),
(69, 27182261, 'Mary', 'Kimani', 'Mumbi', '1986-11-08', 'Githurai 44', 717381647, '', 'Married', 'Wanjohi', 725752171, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:14:52', 'Husband'),
(70, 12345678, 'Wangeci', 'Jedidah', 'Wangeci', '2003-07-17', 'Mwiki', 722406824, '', 'Married', 'N/A', 0, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:14:57', 'N/A'),
(71, 29027696, 'Njuguna', 'Kelvin', 'Njoroge', '2008-10-02', 'Nairobi', 727760210, '', 'Married', 'Mumo', 727760310, 'Male', '', '', 'employed', 'Active', '2013-07-27 12:17:55', 'Mother'),
(72, 27664982, 'Charity', 'Kyule', 'Kavinya', '1990-07-05', 'Gthurai44', 2147483647, '', 'Married', 'Kithusi', 723532407, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:20:24', 'Husband'),
(73, 12345678, 'Dorcas', 'Wanjala', 'Nabwire', '1974-11-23', 'Kasarani', 736342673, '', 'Married', 'Tarian', 735812797, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:21:05', 'Husband'),
(74, 12345678, 'Wanja', 'Margaret', 'Wamuyu', '1982-07-05', 'Githurai', 721725688, '', 'Single', 'Gathoni', 721857476, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:22:39', 'Sister'),
(75, 23102908, 'David', 'Lindah', 'Mwanza', '1983-09-07', 'Kahawa west', 704942710, '', 'Married', 'Winifred', 2147483647, 'Male', '', '', 'employed', 'Active', '2013-07-27 12:24:33', 'Wife'),
(76, 1351591, 'Alice', 'Kanyuru', 'Gasheri ', '1975-07-01', 'Githurai44 ', 72592953, '', 'Married', 'Gathirimo', 728094264, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:25:18', 'Husband'),
(77, 12345678, 'Wanjiru', 'Gladys', 'Wanja', '2008-01-31', 'Githurai 44', 721725688, '', 'Single', 'Gathoni', 721857476, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:28:16', 'Sister'),
(78, 12345678, 'Margret', 'Mbogoli', 'Oladipoh', '1982-11-18', 'Githurai 44', 723336609, '', 'Married', 'Oladipoh', 728172054, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:29:11', 'Husband'),
(79, 12345678, 'Wanjiru', 'Glace', 'Wanja', '2008-01-31', 'Githurai 44', 721725688, '', 'Single', 'Gathoni', 721857476, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:29:17', 'Sister'),
(80, 26846282, 'Rose', 'Gikonyo', 'Njeri', '1988-02-02', 'Githurai44', 725852758, '', 'Married', 'Gikonyo', 724747720, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:30:23', 'Husband'),
(81, 23057078, 'Onyango', 'Shawal', 'Owino', '2010-09-12', 'Mathare', 722175771, '', 'Single', 'Mwihaki', 722175771, 'Male', '', '', 'employed', 'Active', '2013-07-27 12:33:28', 'Mother'),
(82, 12345678, 'Lucy', 'Nyaramba', 'Wanbui', '1988-07-01', 'Githurai44', 725613332, '', 'Married', 'Mutuma', 752353435, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:33:54', 'Husband'),
(83, 12345678, 'Lilian', 'Kamugu', 'Wairimu', '1972-09-05', 'Githurai 44', 717105677, '', 'Married', 'Kamugu', 723337494, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:34:42', 'Husband'),
(84, 12345678, 'Selina', 'Wangu', 'Njeri', '2011-07-01', 'Githurai44', 755087334, '', 'Single', 'Wairimu', 755088734, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:43:08', 'Grandmother'),
(85, 23057078, 'Mwihaki ', 'Lucy', 'Nduta', '1982-12-05', 'Mathare', 722175771, '', 'Married', 'Owino', 729536181, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:42:10', 'Husband'),
(86, 12345678, 'Lydia', 'Karajan', 'Wairimu', '1959-11-05', 'Githurai44', 75508734, '', 'Married', 'Kabuchaa', 725006847, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:48:22', 'Husband'),
(87, 23757589, 'Mukina', 'Grace', 'Wanjui', '2005-04-16', 'Zimmerman', 727351316, '', 'Single', 'Wanjiru', 727351316, 'Female', '', '', 'employed', 'Active', '2013-07-27 12:57:39', 'Mother'),
(88, 12345678, 'N.', 'Lucy', 'Faith', '1986-10-19', 'Ruaka', 722558132, '', 'Married', 'Kimani', 721802127, 'Female', '', '', 'employed', 'Active', '2013-07-27 13:01:50', 'Husband'),
(89, 22358171, 'Veronicah', 'Kamatu', 'Heta', '1981-08-06', 'Githurai44', 724117932, '', 'Married', 'Waithaka', 712583115, 'Female', '', '', 'employed', 'Active', '2013-07-27 13:03:57', 'Husband'),
(90, 12345678, 'Atieno', 'Solidad', 'Otieno', '1983-07-01', 'Nairobi', 700000000, '', 'Single', 'Oti', 733873480, 'Female', '', '', 'employed', 'Active', '2013-07-27 13:04:19', 'Dad'),
(91, 11223490, 'Irene', 'Mungai', 'Wangui', '1970-07-01', 'Githura44', 720626738, '', 'Married', 'Mungai', 722464247, 'Female', '', '', 'employed', 'Active', '2013-07-27 13:10:28', 'Husband'),
(92, 12345678, 'Precious', 'Mungai', 'Wambui', '2005-07-30', 'Githurai44', 720626738, '', 'Single', 'Wangui', 729626738, 'Female', '', '', 'employed', 'Active', '2013-07-27 13:15:56', 'Mother'),
(93, 24961616, 'Fridah', 'Kaugi', 'Wanjiru', '1985-05-31', 'Githurai', 714734818, '', 'Married', 'Maina', 728678692, 'Female', '', '', 'employed', 'Active', '2013-07-27 13:29:10', 'Husband'),
(94, 1029817, 'Duba', 'Chachicha', 'Guya', '1944-07-01', 'Kasarani', 0, '', 'Married', 'N/a', 0, 'Male', '', '', 'employed', 'Active', '2013-07-27 13:32:45', 'N/a'),
(95, 12345678, 'Nambwire', 'Dorcas', 'Tarian', '1974-07-01', 'Kasarani', 736342673, '', 'Married', 'Italian', 736342670, 'Female', '', '', 'employed', 'Active', '2013-07-27 13:37:31', 'Husband'),
(96, 12345678, 'Isabwa', 'Job', 'Tarian', '2007-07-27', 'Kasarani', 736342673, '', 'Single', 'Nabwire', 736342673, 'Male', '', '', 'employed', 'Active', '2013-07-27 13:42:50', 'Mother'),
(97, 29269008, 'Wachera', 'Margaret', 'Wambugu', '1991-02-01', 'Ndaragwa', 710966774, '', 'Single', 'Wacera', 710966774, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:07:49', 'Sister'),
(98, 27678906, 'Kaumbuthu', 'Joshua', 'Thomas', '1986-01-10', 'Githurai 44', 705029596, '', 'Married', 'Kinya', 788604920, 'Male', '', '', 'employed', 'Active', '2013-07-27 14:11:47', 'wife'),
(99, 12345678, 'Mohamed', 'Omar', 'Adan', '1954-03-13', 'Ngomongo', 714836983, '', 'Married', 'Ahamed', 712254032, 'Male', '', '', 'employed', 'Active', '2013-07-27 14:19:38', 'Wife'),
(100, 13322648, 'Njeri', 'Juliet', 'Maina', '1974-07-01', 'Githurai 44', 727873043, '', 'Married', 'Njora', 720354021, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:27:47', 'Husband'),
(101, 1234567, 'Njeri', 'Thiofene', 'Kamau', '2011-06-23', 'githurai44', 716853595, '', 'Single', 'Gesare', 716853595, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:30:19', 'Mother'),
(102, 12345678, 'Gatuku', 'cyrus', 'Joram', '2003-07-01', 'Githurai 44', 727873043, '', 'Single', 'Njora', 720354021, 'Male', '', '', 'employed', 'Active', '2013-07-27 14:32:52', 'Father'),
(103, 7178468, 'Nyambura', 'Anne', 'Mwangi', '1963-11-01', 'Maziwa', 721647668, '', 'Married', 'Mwangi', 722813827, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:36:44', 'Husband'),
(104, 12345678, 'Gesare', 'Philis', 'Ongongo', '1987-08-16', 'Githurai 44', 716853595, '', 'Married', 'Kamau', 70000000, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:38:52', 'husband'),
(105, 12345678, 'Kageni', 'Faith', 'Mbiti', '1993-09-26', 'Zimmerman', 714183586, '', 'Single', 'Mureithi', 725747656, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:41:42', 'Mother'),
(106, 12345678, 'Nguyo', 'Shuke', 'Ndambi', '1983-07-01', 'Ngomongo', 700000000, '', 'Married', 'Nambi', 70000000, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:50:26', 'Husband'),
(107, 12345678, 'Nguyo', 'Wangeshi', 'Ndambi', '2006-06-11', 'Ngomongo', 700000000, '', 'Single', 'Nguyo', 70000000, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:52:48', 'Grandmother'),
(108, 12345678, 'Njogu', 'Maxwell', 'Kinuthia', '2012-07-01', 'Githurai 44', 726402946, '', 'Married', 'Kinuthia', 726402946, 'Male', '', '', 'employed', 'Active', '2013-07-27 14:55:17', 'Father'),
(109, 12345678, 'Wambu', 'Jane', 'Nyaga', '1980-07-07', 'Githurai 44', 710767820, '', 'Married', 'Nganga', 721534005, 'Female', '', '', 'employed', 'Active', '2013-07-27 14:58:41', 'Husband'),
(110, 20605469, 'Njogu', 'David', 'Mbugua', '2008-06-16', 'Githurai 44', 710861026, '', 'Single', 'Mwatomo', 710861026, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:02:31', 'Mother'),
(111, 12345678, 'Munene', 'Roy', 'Gathirimo', '2011-07-01', 'Githurai 44', 725920953, '', 'Single', 'Gacheri', 725920953, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:10:15', 'Mother'),
(112, 24026861, 'Njuguna', 'Alex', 'Mwaura', '2001-07-01', 'Githurai 44', 707264590, '', 'Married', 'Mwaura', 722774698, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:19:19', 'Husband'),
(113, 4432273, 'Wayua', 'Emah', 'Nduba', '1949-07-01', 'Githurai 44', 718626393, '', 'Widowed', 'Daughter', 719588988, 'Female', '', '', 'employed', 'Active', '2013-07-27 16:40:32', 'Daughter'),
(114, 12345678, 'Murage', 'Victor', 'David', '2007-05-05', 'Githurai 44', 710325745, '', 'Single', 'Kagai', 710325745, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:23:27', 'Mother'),
(115, 12345678, 'Nancy', 'Flinn', 'Esabwa', '2001-03-26', 'Githurai 44', 700000000, '', 'Single', ' Nabwire', 736342673, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:26:04', 'Mother'),
(116, 12345678, 'Wangeci', 'Beatrice', 'Kinuthia', '2009-09-19', 'Githurai 44', 726402946, '', 'Single', '', 7264029, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:28:22', 'Father'),
(117, 26520770, 'Onyango', 'Joseph', 'Okoth', '1985-04-04', 'Zimmerman', 701544845, '', 'Single', 'Onyango', 727327526, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:30:47', 'Dad'),
(118, 27961084, 'Kiogora', 'Richard', 'Murung\\''e', '1986-07-01', 'Zimmerman', 750750045, '', 'Married', 'Murung\\''e', 710707295, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:33:11', 'Sister'),
(119, 12345678, 'Kanini', 'Mary', 'Mulwa', '1986-07-01', 'Githurai 44', 704274418, '', 'Married', 'Irungu', 726003703, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:35:36', 'Husband'),
(120, 24346464, 'Wambui', 'Rhoda', 'Kiragu', '1984-07-01', 'Githurai 44', 708835134, '', 'Married', 'Ndirangu', 724619196, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:37:46', 'husband'),
(121, 28667735, 'Mwenesi', 'Brenda', 'Mwenesi', '1989-12-08', 'Githurai 44', 714224383, '', 'Married', 'Badia', 706197286, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:39:46', 'Husband'),
(122, 2174220, 'Mugure', 'Virginia', 'Mwangi', '2008-07-01', 'Soweto', 715178969, '', 'Single', 'Njeri', 715778996, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:42:13', 'Mother'),
(123, 23995438, 'Mueni', 'Catherine', 'Hosea', '1984-08-28', 'Githurai 44', 703143770, '', 'Married', 'Mukamba', 722714113, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:44:46', 'Husband'),
(124, 22936970, 'Adhiambo', 'Mercy', 'Obirika', '1983-07-01', 'Githurai 44', 728592582, '', 'Married', 'Ndar', 722785349, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:47:30', 'Husband'),
(125, 11584493, 'Wangari', 'Nancy', 'Mwangi', '1971-07-01', 'Githurai 44', 725546222, '', 'Married', 'husband', 715371648, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:50:47', 'Husband'),
(126, 12345678, 'Mwangi', 'Alvin', 'Manson', '2004-07-01', 'Githurai 44', 725546222, '', 'Single', 'Wangari', 725546222, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:52:51', 'Mother'),
(127, 12761295, 'Kimaru', 'Lenny', 'Kanyiri', '2001-07-01', 'Githurai 44', 727257311, '', 'Married', 'Kimani', 727257311, 'Male', '', '', 'employed', 'Active', '2013-07-27 15:55:51', 'Father'),
(128, 1382168, 'Waithera', 'Millicent', 'Mwangi', '1958-07-01', 'Kahawa West', 727214060, '', 'Married', 'Mwangi', 727214060, 'Female', '', '', 'employed', 'Active', '2013-07-27 15:58:14', 'Husband'),
(129, 20490199, 'Naomi', 'Kamau', 'Wairimu', '1965-07-01', 'Githurai 44', 724619186, '', 'Single', 'Kamau', 724619186, 'Female', 'Thome', '', 'not employed', 'Active', '2013-08-16 09:42:06', 'Son'),
(130, 12345678, 'Jane', 'Odhiambo', 'Odhiambo', '1968-04-14', 'Githurai 44', 721819641, '', 'Married', 'Odhiambo', 721819641, 'Female', '', 'Secretary, Church', 'employed', 'Active', '2013-07-30 13:31:21', 'Husband'),
(131, 25741886, 'Mbula', 'Maureen', 'Musila', '1985-10-03', 'Embakasi', 788804866, '', 'Single', 'Kanini', 728902845, 'Female', '', '', 'not employed', 'Active', '2013-07-31 13:24:50', 'Sister'),
(132, 12762932, 'Nyambura', 'rose', 'Maina', '1973-07-01', 'Githurai', 722767758, '', 'Married', 'Munene', 722811228, 'Female', '', '', '', 'Active', '2013-08-01 12:01:24', 'Husband'),
(133, 29301416, 'beatrace', 'waithaka', 'wahito', '1993-11-18', 'githurai 44', 727219095, '', '', 'karuma', 700175185, 'Female', '', '', 'not employed', 'Active', '2013-08-08 11:31:33', 'husband'),
(134, 27958038, 'Samuel', 'Mugo', 'Maina', '1990-05-16', 'Githurai 44', 728060501, '', 'Single', 'Maina', 728060501, 'Male', '', '', 'not employed', 'Active', '2013-08-13 06:50:37', 'Brother'),
(135, 20590904, 'George', 'Muturi', 'Kamau', '1977-07-01', 'Kasarani', 722817013, '', 'Married', 'Mukuhi', 725560503, 'Male', '', 'Self', 'employed', 'Active', '2013-08-13 08:47:42', 'wife'),
(136, 13513591, 'Helen', 'Kanyoro', 'Kanyuru', '1957-07-01', 'Meru', 725920953, '', 'Married', 'Kanyuru', 725920953, 'Female', '', '', 'not employed', 'Active', '2013-08-13 09:05:51', 'Husband'),
(137, 22010422, 'Alice', 'Mwangi', 'Muthoni', '1981-05-06', 'Kamumbi', 725679824, '', 'Married', 'Mwangi', 725679824, 'Female', '', '', 'not employed', 'Active', '2013-08-13 09:31:24', 'Husband'),
(138, 31210274, 'Kiambati', 'Kenneth', 'Kairu', '1994-09-30', 'Githurai 44', 718034970, '', 'Single', 'Kairu', 720833750, 'Male', '', '', 'not employed', 'Active', '2013-08-13 09:57:07', 'Father'),
(139, 25349271, 'Effidah ', 'John', 'Mutile', '1987-12-20', 'Githurai 44', 717550735, '', 'Single', 'Jane', 720330226, 'Female', '', '', 'not employed', 'Active', '2013-08-13 10:08:23', 'Friend'),
(140, 21870323, 'Anthony', 'Samuel', 'Givaba', '1979-07-01', 'Zimmerman', 713708695, '', 'Married', 'Mungai', 703586257, 'Male', '', '', 'employed', 'Active', '2013-08-13 10:14:13', 'wife'),
(141, 12345678, 'Baraka', 'Samuel', 'Musyoka', '2006-07-01', 'Maziwa', 7259586, '', 'Single', '', 7259586, 'Male', '', '', 'not employed', 'Active', '2013-08-16 06:55:11', 'Father'),
(142, 27344401, 'Wangechi', 'Naomi', 'Mbataru', '1989-06-01', 'Thome', 720715102, '', 'Single', 'Mbataru', 722752689, 'Female', '', 'Millenuim', 'employed', 'Active', '2013-08-16 09:53:53', 'Mother'),
(143, 12345678, 'Nyambura', 'Lanet', 'Wanjiru', '1996-05-30', 'Thome', 701379002, '', 'Single', 'N.', 720715102, 'Female', '', '', 'not employed', 'Active', '2013-08-20 14:05:15', 'Sister'),
(144, 12345678, 'Wambui', 'Evelyne', 'Maina', '2013-07-14', 'Githurai 44', 727219095, '', 'Single', 'Wahito', 727219095, 'Female', '', '', 'not employed', 'Active', '2013-08-21 12:33:25', 'Mother'),
(145, 25209694, 'Katile', 'Sarah ', 'Katile', '1980-01-01', 'Githurai ', 721974803, '', 'Married', 'Makumi', 722375359, 'Female', '', '', 'not employed', 'Active', '2013-08-21 13:41:30', 'Husband'),
(146, 12345678, 'Kanana', 'Natasha', 'Mwirigi', '2013-08-09', 'Githurai 44', 712125490, '', 'Single', 'Githinji', 728025681, 'Female', '', 'Self Employed', 'employed', 'Active', '2013-08-23 10:07:48', 'Father'),
(147, 11345678, 'Wairimu', 'Favour', 'Njoroge', '2013-08-19', 'Githurai 44', 727217848, '', 'Single', 'Wanjiru', 727217848, 'Female', '', '', 'not employed', 'Active', '2013-08-23 11:20:41', 'Mother'),
(148, 2345435, 'sam', 'sam', 'sam', '2013-08-02', 'langfbf', 722655744, '', 'Single', 'fdgbdcb', 2147483647, 'Male', '', '', 'not employed', 'Active', '2013-08-29 19:52:47', 'sdgvsdf'),
(149, 32423434, 'musa', 'musa', 'musa', '2004-08-12', 'lahfhfhf', 723456765, '', 'Single', 'wez', 745635453, 'Male', '', '', 'not employed', 'Active', '2013-08-29 20:03:34', 'wes'),
(150, 2345678, 'wagu', 'wagu', 'wagu', '2004-08-03', 'langata', 722345654, '', 'Married', 'was', 723456756, 'Male', '', '', 'not employed', 'Active', '2013-08-30 05:37:21', 'was'),
(151, 23446576, 'psi', 'psi', 'psi', '2005-08-04', 'psi', 723456657, '', 'Married', 'psi', 734556474, 'Male', '', '', 'not employed', 'Active', '2013-08-30 07:06:09', 'psi');

-- --------------------------------------------------------

--
-- Table structure for table `patient_allergy`
--

CREATE TABLE IF NOT EXISTS `patient_allergy` (
  `patient_id` int(11) NOT NULL,
  `allergy` varchar(51) NOT NULL,
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_allergy`
--

INSERT INTO `patient_allergy` (`patient_id`, `allergy`) VALUES
(15, 'no known allegy'),
(15, 'no known allegy'),
(16, 'no food or drug allergy'),
(2, 'no known drug allergy'),
(18, 'none known'),
(21, 'No known Drug and Food allergies'),
(22, 'None known'),
(24, 'No known food or drug allergies'),
(23, 'allergic to Nevirapine'),
(25, 'No known food and drug allergies'),
(27, 'Non known'),
(20, 'no known drug allergy'),
(26, 'No known Drug and food allergies'),
(28, 'no known allergy'),
(35, 'None'),
(37, 'No known Food and Drug allergies'),
(19, 'Non known'),
(36, 'No known Food and drug Allergies'),
(42, 'NO KNOWN ALLERGY'),
(31, 'No known drug or food allergy'),
(34, 'NO KNOWN ALLERGY'),
(58, 'None'),
(32, 'No known food or drug allergies'),
(38, 'NONE'),
(45, 'TO DUST,SMOKE,HAY'),
(33, 'No known drug and food allergies'),
(40, 'None '),
(54, 'DUST SMOKE ETC'),
(43, 'No Known allergy to drugs or foods'),
(68, 'NO KNOWN ALLERGY'),
(66, 'None known'),
(49, 'NONE'),
(47, 'None'),
(46, 'NO KNOWN ALLERGY'),
(71, 'No knwon food or drug allergy'),
(82, 'No known food and drug allergies'),
(53, 'None known'),
(75, 'NONE'),
(48, 'No known food pr drug allergy'),
(50, 'No known Food and Drug allergies'),
(50, 'No known Food and Drug allergies'),
(64, 'Dust, cold'),
(52, 'none'),
(51, 'none'),
(57, 'None known'),
(62, 'none'),
(55, 'No known food and drug allergies.'),
(69, 'None'),
(56, 'no  allergy'),
(79, 'None'),
(86, 'No known food and drug allergies'),
(84, 'No known food and drug allergies'),
(87, 'none'),
(74, 'None'),
(67, 'None known'),
(104, 'no known drug allergy'),
(101, 'none'),
(76, 'No known food and drug allergies'),
(60, 'None known'),
(78, 'none'),
(93, 'NONE'),
(108, 'none known'),
(102, 'NONE'),
(72, 'No known Food and Drug Allergies'),
(61, 'NO ALLERGY'),
(98, 'NO ALLERGY'),
(111, 'dust, cold'),
(114, 'NO KNOWN ALLERGY'),
(83, 'none'),
(83, 'none'),
(121, 'to cold, dust,'),
(122, 'Dust, cold'),
(124, 'NO KNOWN ALLERGY'),
(125, 'none'),
(126, 'dust,smoke'),
(120, 'No known allergy'),
(106, 'NONE'),
(117, 'none'),
(117, 'none'),
(118, 'no known allergy'),
(85, 'no known drug allergy'),
(85, 'no known drug allergy'),
(30, 'no known allergy'),
(30, 'no known allergy'),
(30, 'no known allergy'),
(130, 'no known drug allergy'),
(131, 'no known drug allergy'),
(131, 'NONE'),
(131, 'NONE'),
(132, 'none'),
(133, 'none'),
(134, 'NO HX OF ASTHMA OR ALLERGY'),
(135, 'none'),
(138, 'none'),
(139, 'none'),
(142, 'NO KNOWN ALLERGY'),
(142, 'NO KNOWN ALLERGY'),
(144, 'none'),
(145, 'no known allergy'),
(146, 'None'),
(15, 'apples'),
(151, 'eggs');

-- --------------------------------------------------------

--
-- Table structure for table `patient_payments`
--

CREATE TABLE IF NOT EXISTS `patient_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitid` int(11) NOT NULL,
  `MpesaCode` varchar(500) NOT NULL,
  `cpay` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `patient_payments`
--

INSERT INTO `patient_payments` (`id`, `visitid`, `MpesaCode`, `cpay`, `cash`) VALUES
(1, 139, '', 0, 1035),
(2, 145, '', 0, 620),
(3, 147, 'DW34RT456', 300, 0),
(4, 148, 'DW45HG556', 300, 0),
(5, 149, 'DX45TH987', 300, 0),
(6, 150, 'DX23TH645', 1600, 0),
(7, 152, 'DX34HT756', 300, 0),
(8, 153, 'DX56FT456', 300, 0),
(9, 154, '', 0, 390),
(10, 158, 'DE34TH678', 1600, 0),
(11, 162, '', 0, 100),
(12, 163, '', 0, 150),
(13, 164, '', 0, 14),
(14, 165, '', 0, 1000),
(15, 166, '', 0, 30),
(16, 167, '', 0, 13),
(17, 168, '', 0, 1600),
(18, 169, '', 0, 11500),
(19, 170, '', 0, 100),
(20, 171, '', 0, 100),
(21, 172, '', 0, 100),
(22, 173, '', 0, 30),
(23, 174, '', 0, 1000),
(24, 175, '', 0, 1),
(25, 176, '', 0, 100),
(26, 177, '', 0, 7),
(27, 178, 'DE45GH679', 600, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(50) NOT NULL,
  `MpesaCode` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `paid` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `visitid` (`visitid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `faculty`, `MpesaCode`, `cost`, `visitid`, `paid`) VALUES
(1, '', '', 400, 2, '1'),
(2, '', '', 350, 3, '0'),
(3, '', '', 350, 3, '1'),
(4, '', '', 350, 4, '0'),
(5, '', '', 0, 7, '0'),
(6, '', '', 0, 7, '0'),
(7, '', '', 450, 7, '0'),
(8, '', '', 200, 8, '0'),
(9, '', '', 350, 9, '0'),
(10, '', '', 350, 24, '0'),
(11, '', '', 300, 23, '0'),
(12, '', '', 550, 35, '0'),
(13, '', '', 200, 69, '0'),
(14, '', '', 600, 64, '0'),
(15, '', '', 300, 64, '0'),
(16, '', '', 300, 57, '0'),
(17, '', '', 100, 61, '0'),
(18, '', '', 750, 81, '0'),
(19, '', '', 350, 93, '0'),
(20, '', '', 200, 74, '0'),
(21, '', '', 200, 95, '0'),
(22, '', '', 650, 94, '0'),
(23, '', '', 1350, 119, '0'),
(24, '', '', 350, 120, '0'),
(25, '', '', 900, 124, '1'),
(26, '', '', 450, 125, '1'),
(27, '', '', 350, 126, '1'),
(28, '', '', 350, 127, '1'),
(29, '', '', 450, 139, '1'),
(30, '', '', 450, 140, '1'),
(31, '', '', 200, 145, '1'),
(32, '', '', 100, 147, '1'),
(33, '', '', 100, 153, '1'),
(34, '', '', 0, 154, '1'),
(35, '', '', 1000, 156, '1'),
(36, '', '', 700, 161, '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment_demo`
--

CREATE TABLE IF NOT EXISTS `payment_demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitid` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment_option` varchar(500) NOT NULL,
  `paid` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payment_demo`
--

INSERT INTO `payment_demo` (`id`, `visitid`, `total`, `payment_option`, `paid`) VALUES
(1, 0, 0, 'cash', 'Yes'),
(2, 159, 0, 'cash', 'Yes'),
(3, 159, 0, 'cash', 'Yes'),
(4, 159, 300, 'cash', 'Yes'),
(5, 159, 300, 'cash', 'Yes'),
(6, 159, 300, 'cash', 'Yes'),
(7, 159, 300, 'cash', 'Yes'),
(8, 159, 300, 'Mpesa', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `pharm_payments`
--

CREATE TABLE IF NOT EXISTS `pharm_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitid` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `mpesa` varchar(255) NOT NULL,
  `paid` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `pharm_payments`
--

INSERT INTO `pharm_payments` (`id`, `visitid`, `cost`, `mpesa`, `paid`) VALUES
(1, 0, 0, '', '1'),
(2, 11, 10, '', '0'),
(3, 122, 205, '', '1'),
(4, 124, 30, '', '1'),
(5, 125, 320, '', '1'),
(6, 127, 25, '', '1'),
(7, 136, 7, '', '1'),
(8, 138, 90, '', '1'),
(9, 139, 285, '', '1'),
(10, 142, 32, '', '1'),
(11, 140, 440, '', '1'),
(12, 0, 0, '', '1'),
(13, 145, 120, '', '1'),
(14, 0, 0, '', '1'),
(15, 147, 4300, '', '1'),
(16, 148, 900, '', '1'),
(17, 149, 2400, '', '1'),
(18, 150, 360, '', '1'),
(19, 153, 470, '', '1'),
(20, 155, 2100, '', '1'),
(21, 157, 1280, '', '1'),
(22, 161, 8100, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checkupid` int(11) NOT NULL,
  `docid` int(11) NOT NULL,
  `pharmid` int(20) NOT NULL,
  `medname` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `administeredstatus` enum('dispensed','not dispensed') NOT NULL DEFAULT 'not dispensed',
  `paymentid` int(11) NOT NULL,
  `paid` enum('no','yes') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `checkupid` (`checkupid`),
  KEY `docid` (`docid`),
  KEY `medname` (`medname`),
  KEY `labtechid` (`pharmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `checkupid`, `docid`, `pharmid`, `medname`, `dosage`, `duration`, `remarks`, `amount`, `administeredstatus`, `paymentid`, `paid`) VALUES
(1, 3, 58, 56, 'IBU002', '400mg', '7 days', 'take one after every eight hours', '14', 'not dispensed', 0, 'no'),
(2, 5, 58, 0, 'CET001', '10mg nocte', '5', 'to take at night', '5', 'not dispensed', 0, 'no'),
(3, 11, 58, 0, 'OME001', '20mg BD', '7days', 'add albendazole', '14', 'not dispensed', 1, 'yes'),
(4, 16, 58, 0, 'DIC005', '100mg OD', '7 days', 'add albendazole', '7', 'not dispensed', 0, 'no'),
(5, 14, 60, 0, 'AMO001', '250mg 3x per day', '5days', 'No remarks', '15', 'not dispensed', 0, 'no'),
(6, 13, 63, 0, '', 'Gentamicin Ear Drops', '7 days', '2 drops 4 times daily for 7 days', '2 drops 4 times daily', 'not dispensed', 0, 'no'),
(7, 12, 63, 0, 'CET002', '5mg', '5 days', '5 mg once daily', '5 mg once daily', 'not dispensed', 0, 'no'),
(8, 26, 63, 0, 'ALB001', '400mg', 'stat', '400 mg stat ', '400', 'not dispensed', 0, 'no'),
(9, 29, 62, 0, 'IBU001', '10 ml ', '7 days', 'PRN use', '3', 'not dispensed', 0, 'no'),
(10, 25, 63, 0, 'IBU002', '400mg tds', '1 week', '400mg tds for 7 days', '21 tabs', 'not dispensed', 0, 'no'),
(11, 17, 60, 0, 'AMO001', '500mg tds', '5 days', 'None', '15', 'not dispensed', 0, 'no'),
(12, 8, 63, 0, 'IND001', '50mg tds', '2 weeks', 'To come back for review after the two weeks', '84 tabs', 'not dispensed', 0, 'no'),
(13, 8, 63, 0, 'AZI002', '500mg OD', '3 days', '500 mg OD for 3 days', '3 tabs', 'not dispensed', 0, 'no'),
(14, 21, 63, 0, 'AMO021', '2.5mls tds', '5 days', 'Take the treatment over 5 days', '37.5mls', 'not dispensed', 0, 'no'),
(15, 21, 63, 0, 'CET002', '5mg OD', '5 days', 'Take the treatment alongside the antibiotics', '25mg total', 'not dispensed', 0, 'no'),
(16, 20, 63, 0, 'DEE001', 'twice daily', '2 weeks', 'apply for two weeks', '2 tubes', 'not dispensed', 0, 'no'),
(17, 24, 60, 0, 'FOL001', '5mg od', '2weeks', 'Also give ferrous sulphate. For 2 weeks, 200 mg daily', '14', 'not dispensed', 0, 'no'),
(18, 22, 63, 0, 'CAL011', 'Apply twice daily', '1 week', 'apply twice daily', '1 tube', 'not dispensed', 0, 'no'),
(19, 28, 60, 0, 'CHL001', '2mg once a day', '5 day', 'Take at night', '25 ml', 'not dispensed', 0, 'no'),
(20, 32, 63, 0, 'OME001', '1 tab OD', '2 weeks ', 'To cut back on alcohol as well in combination with the treatment', '14 tabs', 'not dispensed', 0, 'no'),
(21, 37, 60, 0, 'AMO001', '1g TDS', '7 days', 'Advised chest X-ray and to attend hospital if symptoms worse', '42 assuming 500mg each', 'not dispensed', 0, 'no'),
(22, 38, 58, 0, 'OME001', '20MG BD', '7', 'COMPLETE', '14', 'not dispensed', 0, 'no'),
(23, 69, 63, 0, 'FER001', '1 tablet OD', '1 month', 'Take this monthly until delivery', '30 tabs', 'not dispensed', 0, 'no'),
(24, 42, 60, 0, 'CLO001', 'Apply bd on rash', '1 week', 'No remarks', '1 tube', 'not dispensed', 0, 'no'),
(25, 69, 63, 0, 'FOL001', '1 tablet', '1 month', 'Take monthly until delivery', '30 tablets', 'not dispensed', 0, 'no'),
(26, 36, 63, 0, 'ALB001', '1 tablet stat', 'stat', 'deworming', '1 ', 'not dispensed', 0, 'no'),
(27, 39, 63, 0, 'ALB002', '100mg stat', '100mg', 'Deworming', '5mls', 'not dispensed', 0, 'no'),
(28, 48, 60, 0, 'CLO006', '200mg od', '1 week', 'Insert at night', '7', 'not dispensed', 0, 'no'),
(29, 48, 60, 0, 'MET004', '400mg TDS ', '5 days', 'Take with meals', '15', 'not dispensed', 0, 'no'),
(30, 41, 58, 0, 'AZI002', '500mg', 'od', 'complete', '3 days', 'not dispensed', 0, 'no'),
(31, 53, 62, 0, 'AMO001', '1g  TDS', '7 days', 'No special indications', '42', 'not dispensed', 0, 'no'),
(32, 40, 64, 0, 'AMO003', '500', 'thrice', 'complete dose\\r\\nbefore meals', '5 days', 'not dispensed', 0, 'no'),
(33, 40, 64, 0, 'CHL002', '4mg', '3 days', 'complete dose', '2 times a day', 'not dispensed', 0, 'no'),
(34, 46, 60, 0, 'CIP001', '500mg bd', '7 days', 'None', '14', 'not dispensed', 0, 'no'),
(35, 44, 63, 56, 'ESO001', '1', '30 days', 'For review within one month', '30 tabs', 'not dispensed', 0, 'no'),
(36, 58, 62, 0, 'DIC005', '1*2', '14 days', 'To take after meals', '0', 'not dispensed', 0, 'no'),
(37, 65, 60, 0, 'AMO016', '5ml TDS', '5 days', 'None', '45 ml', 'not dispensed', 0, 'no'),
(38, 73, 63, 0, 'ESO001', '1 tab', '2 weeks', 'For review and refill at the end of this week', '14 tabs', 'not dispensed', 0, 'no'),
(39, 87, 62, 0, 'DIC005', '1*2', '5 days', 'Take after meals', '0', 'not dispensed', 0, 'no'),
(40, 87, 62, 0, 'MUL001', '1*1', '14 days', 'Neuropathy', '0', 'not dispensed', 0, 'no'),
(41, 23, 58, 0, 'PYR001', '50mg', '14 days', 'add albendazole', '14', 'not dispensed', 0, 'no'),
(42, 23, 58, 0, 'PYR001', '50mg', '14 days', 'add albendazole', '14', 'not dispensed', 0, 'no'),
(43, 72, 63, 0, 'CIP001', '125 mg tds', '5 days', 'Please show Grandmother how to split the tabs', '4 tabs', 'not dispensed', 0, 'no'),
(44, 62, 60, 0, 'AMO003', '1 bd', '5 days', 'None', '10', 'not dispensed', 0, 'no'),
(45, 55, 62, 0, 'ZIN003', '20mgs od ', '10 days', 'dissolve in water', '10 tabs', 'not dispensed', 0, 'no'),
(46, 69, 63, 0, 'FOL001', '1 OD', '1 month', 'Take until delivery', '30 tabs', 'not dispensed', 0, 'no'),
(47, 84, 62, 0, 'GRI002', '1*!', '14 days', 'AS per prescription', '0', 'not dispensed', 0, 'no'),
(48, 92, 58, 0, 'OME001', '20mg bd', '14 days', 'add albendazole', '28', 'not dispensed', 0, 'no'),
(49, 89, 58, 0, 'CIP002', 'bd', '7 days', 'add albendazole', '1', 'not dispensed', 0, 'no'),
(50, 35, 58, 0, 'DIC005', '100mg', '14', 'add albendazole', '14', 'not dispensed', 0, 'no'),
(51, 35, 58, 0, 'DIC005', '100mg', '14', 'add albendazole', '14', 'not dispensed', 0, 'no'),
(52, 64, 58, 0, 'PYR001', '50mg', '14 days', 'add ABZ', '14', 'not dispensed', 0, 'no'),
(53, 60, 63, 0, 'CAL011', 'Apply BD for two weeks', '2 weeks', 'Use it continuously for the two weeks', '2 tubes', 'not dispensed', 0, 'no'),
(54, 60, 63, 0, 'IBU002', '400mg tds', '5 days', 'Uaw for five days', '15 tabs', 'not dispensed', 0, 'no'),
(55, 90, 64, 0, 'GRI003', '250MG OD', '6 WEEKS', 'TAKE AFTER MEALS', '  42', 'not dispensed', 0, 'no'),
(56, 50, 58, 0, 'DIC005', '100MG OD', '14 DAYS', 'ADD ABZ', '14', 'not dispensed', 0, 'no'),
(57, 90, 64, 0, 'CLO001', '1%', '6 WEEKS', 'APPLY ONCE DAILY', '3 TUBES', 'not dispensed', 0, 'no'),
(58, 86, 58, 56, 'ESO001', '20MG BD', '14 DAYS', 'ADD ABZ', '14', 'not dispensed', 0, 'no'),
(59, 99, 62, 0, 'SAL001', 'as below', 'as below', 'Ventolin inhalor 3 tid for 3/7 then 2 puffs tid for one week then as needed.\\r\\nFluxetide 125 1 puff bd for 2/12', 'as below', 'not dispensed', 0, 'no'),
(60, 102, 58, 0, 'CEF010', '5MLS BD', '7 DAYS', 'COMPLETE', '1', 'not dispensed', 0, 'no'),
(61, 102, 58, 0, 'PAR001', '5MLS TDS', '7DAYS', 'COMPLETE', '1', 'not dispensed', 0, 'no'),
(62, 102, 58, 0, 'CET002', '5MLS NOCTE', '7DAYS', 'COMPLETE', '1', 'not dispensed', 0, 'no'),
(63, 70, 64, 56, 'ZXCE01', '1*2', '3 DAYS', 'complete ', '21tabs', 'not dispensed', 0, 'no'),
(64, 98, 62, 0, 'CET002', '5mls tds', '5 days', 'TDS use', '0', 'not dispensed', 0, 'no'),
(65, 112, 58, 0, 'ALB001', 'STAT', '1', 'COMPLETE', '1', 'not dispensed', 0, 'no'),
(66, 111, 62, 0, 'DIC005', '1*1', '5 days', 'Please also prescribe myospaz to buy', '0', 'not dispensed', 0, 'no'),
(67, 57, 62, 0, 'CEF011', '500mg po BD', '7 days', 'To complete medications', '28', 'not dispensed', 0, 'no'),
(68, 81, 58, 0, 'DIC005', '100mg od', '7 days', 'complete', '7', 'not dispensed', 0, 'no'),
(69, 113, 58, 0, 'AMIT01', '25mg nocte', '14 days', 'complete', '14', 'not dispensed', 0, 'no'),
(70, 114, 58, 0, 'CIP002', 'bd', '1 week', 'com', '1', 'not dispensed', 0, 'no'),
(71, 100, 62, 0, 'CET002', '10mls TDS', '5 days', 'As prescribed', '0', 'not dispensed', 0, 'no'),
(72, 100, 62, 0, 'PAR001', '10mls TDS', '5 dyas', 'As prescribed', '0', 'not dispensed', 0, 'no'),
(73, 108, 58, 0, 'FOL001', '5mg od', '28', 'Com', '28', 'not dispensed', 0, 'no'),
(74, 116, 62, 0, 'CET001', '10 mg od ', '5 days', 'to return in five days for review.', '0', 'not dispensed', 0, 'no'),
(75, 93, 58, 0, 'PAR001', '1 gm bd', '7 days', 'fjrnjnw', '18', 'not dispensed', 0, 'no'),
(76, 105, 64, 0, 'ERY002', '500mg 4four times a day', '7 days ', 'adviced to have a chest xray and an esr', '28tabs', 'not dispensed', 0, 'no'),
(77, 106, 58, 0, 'DIC005', '100mg ', 'od', 'fjfe', '7', 'not dispensed', 0, 'no'),
(78, 106, 58, 0, 'ALB001', '400mg', 'stat', 'dfd', '1', 'not dispensed', 0, 'no'),
(79, 106, 58, 0, 'AMO001', '500mg', 'tds', 'rggr', '15', 'not dispensed', 0, 'no'),
(80, 120, 58, 0, 'PRE010', '20mg AM', '5days', 'fed', '20', 'not dispensed', 0, 'no'),
(81, 122, 58, 56, 'CET001', '10 mg nocte', '5', 'sww', '5', 'dispensed', 1, 'yes'),
(82, 122, 58, 56, 'AMO001', '500mg tds', '5 days', 'frf', '30', 'dispensed', 1, 'yes'),
(83, 122, 58, 56, 'ALB001', '400mg stat', '1', 'ff4rfg', '1', 'dispensed', 1, 'yes'),
(84, 124, 58, 56, 'PAR001', '1gm tds', '5 days', 'yuu', '30', 'dispensed', 1, 'yes'),
(85, 125, 58, 56, 'PAR001', '1 gm bd', '5', 'dispense', '30', 'dispensed', 1, 'yes'),
(86, 125, 58, 56, 'CET001', '10mg nocte', '7 days', 'dispense', '7', 'dispensed', 1, 'yes'),
(87, 125, 58, 0, 'CET001', '10mg nocte', '7', 'disp', '7', 'not dispensed', 0, 'no'),
(88, 125, 58, 56, 'AZI002', '500mg od', '3 days', 'disp', '3', 'dispensed', 1, 'yes'),
(89, 126, 58, 0, 'FLU012', '500mg QID', '5', 'xaxax', '20', 'not dispensed', 0, 'no'),
(90, 126, 58, 0, 'IBU002', '400mg tds', '5', 'disp', '30', 'not dispensed', 0, 'no'),
(91, 127, 58, 56, 'CLA006', '500MG BD', '5 DAYS', 'DISP', '3', 'not dispensed', 0, 'no'),
(92, 127, 58, 0, 'CET001', '10MG', 'OD', 'DISP', '5 DAYS', 'not dispensed', 1, 'yes'),
(93, 128, 58, 0, 'ALB001', '400mg', 'stat', 'eff', '2', 'not dispensed', 0, 'no'),
(94, 128, 58, 0, '', '400mg', 'stat', 'aa', '2', 'not dispensed', 0, 'no'),
(95, 128, 58, 0, '', '400mg', '1', 'aa', '2', 'not dispensed', 0, 'no'),
(96, 128, 58, 0, '', '400mg stat', '1', 'qs', '2', 'not dispensed', 0, 'no'),
(97, 131, 58, 0, 'DOX006', '100mg bd', '14 days', 'eee', '28', 'not dispensed', 0, 'no'),
(98, 132, 58, 0, 'AMO003', '375mg tds', '7 days', 'asjwd', '21', 'not dispensed', 0, 'no'),
(99, 132, 58, 0, 'DIC005', '100mg', '7 days', 'jjj', '7', 'not dispensed', 0, 'no'),
(100, 132, 58, 0, 'PRO004', '25mg bd', '5', 'f', '10', 'not dispensed', 0, 'no'),
(101, 136, 58, 56, 'AMIT01', '25MG', '7', 'DISP', '7', 'dispensed', 1, 'yes'),
(102, 136, 58, 0, 'DIC005', '100MG', '7', 'DISP', '7', 'not dispensed', 0, 'no'),
(103, 138, 58, 56, 'CHL001', '2.5ml bd', '5', 'send', '1', 'dispensed', 1, 'yes'),
(104, 138, 58, 56, 'AMO002', '2.5ml bd', '5', 'disp', '1', 'dispensed', 1, 'yes'),
(105, 139, 58, 56, 'AMO003', '375mg tds', '5', 'disp', '15', 'dispensed', 1, 'yes'),
(106, 139, 58, 56, 'PAR001', '1 gm tds', '5', 'dispense', '30', 'dispensed', 1, 'yes'),
(107, 142, 61, 61, 'ACY001', 'BD', '4 days', 'none', '8', 'dispensed', 1, 'yes'),
(108, 142, 61, 61, 'ASP005', 'td', '4 days', 'none', '`12', 'dispensed', 1, 'yes'),
(109, 140, 61, 61, 'ACY004', 'bd', '10 days', 'none', '20', 'dispensed', 1, 'yes'),
(110, 140, 61, 61, 'AMO001', 'td', '10 days', 'none', '30', 'dispensed', 1, 'yes'),
(111, 140, 61, 0, '', 'bd', '10 days', 'none', '20', 'not dispensed', 0, 'no'),
(112, 144, 61, 0, 'ADRE01', '34', '20 days', '', '5 tablets', 'not dispensed', 0, 'no'),
(113, 145, 61, 0, 'AMIT01', '4', '6', '', '8', 'not dispensed', 0, 'no'),
(114, 145, 61, 0, 'AMI003', '5', '5', 'dfkdfjk', '6', 'not dispensed', 1, 'yes'),
(115, 147, 61, 61, 'AMI004', '4', '6', 'after meals', '10', 'dispensed', 1, 'yes'),
(116, 148, 61, 61, 'AMIN01', '34', '14', 'uty', '10', 'dispensed', 1, 'yes'),
(117, 149, 61, 61, 'AMI003', '34', '14', '', '120', 'dispensed', 1, 'yes'),
(118, 150, 61, 61, 'ADRE01', '4', '4', 'jsdfdjsfh', '4', 'dispensed', 1, 'yes'),
(119, 153, 61, 61, 'ADRE01', '5', '5', 'after meals', '5', 'dispensed', 1, 'yes'),
(120, 153, 61, 61, 'ACY001', '55', '5', 'fhgf', '5', 'dispensed', 1, 'yes'),
(121, 155, 61, 61, 'DE4566', 'bd', '12 days', 'none', '1', 'dispensed', 1, 'yes'),
(122, 155, 61, 61, 'ACY00', 'td', '12 days', 'none', '1', 'dispensed', 1, 'yes'),
(123, 157, 66, 0, 'DE4566', 'bd', '12 days', 'none', '12', 'not dispensed', 1, 'yes'),
(124, 157, 66, 0, 'ACY00', 'td', '23', 'none', '4', 'not dispensed', 1, 'yes'),
(125, 161, 66, 0, 'DE456', 'td', '12 days', 'NONE', '36', 'not dispensed', 1, 'yes'),
(126, 161, 66, 0, 'DE4566', 'BD', '12 days', 'none', '45', 'not dispensed', 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE IF NOT EXISTS `refer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docid` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `docemail` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `refer`
--

INSERT INTO `refer` (`id`, `docid`, `visitid`, `docemail`, `email`, `subject`, `message`) VALUES
(1, 62, 118, 'lmarani@healthstrat.co.ke', 'info@lancet.co.ke', 'Breast FNA', 'FNA for a breast lump on left breast lower outer quadrant');

-- --------------------------------------------------------

--
-- Table structure for table `stock_movement`
--

CREATE TABLE IF NOT EXISTS `stock_movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drug_id` int(11) NOT NULL,
  `date_of_issue` date NOT NULL,
  `reference` varchar(500) NOT NULL,
  `exp_date` date NOT NULL,
  `opening_bal` int(11) NOT NULL,
  `issues` int(11) NOT NULL,
  `closing_bal` int(11) NOT NULL,
  `issuing_officer` varchar(255) NOT NULL,
  `service_point` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `stock_movement`
--

INSERT INTO `stock_movement` (`id`, `drug_id`, `date_of_issue`, `reference`, `exp_date`, `opening_bal`, `issues`, `closing_bal`, `issuing_officer`, `service_point`) VALUES
(1, 1, '2013-08-29', 'dispensed', '2013-09-12', 14, 8, 6, '61', 'Patient :4'),
(2, 9, '2013-08-29', 'Dispensed', '0000-00-00', 2970, 30, 2940, '61', 'Patient :146'),
(3, 144, '2013-08-29', 'Dispensed', '0000-00-00', 2970, 30, 2940, '61', 'Patient :146'),
(4, 3, '2013-08-30', 'Dispensed', '0000-00-00', 10, 4, 6, '61', 'Patient :150'),
(5, 1, '2013-08-30', 'Dispensed', '0000-00-00', 6, 5, 1, '61', 'Patient :151'),
(6, 3, '2013-08-30', 'Dispensed', '0000-00-00', 6, 5, 1, '61', 'Patient :151'),
(7, 2, '2013-09-02', 'Dispensed', '0000-00-00', 15, 1, 14, '61', 'Patient :4'),
(8, 3, '2013-09-02', 'Dispensed', '0000-00-00', 10, 1, 9, '61', 'Patient :4');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `supplier` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `cost`, `supplier`) VALUES
(1, 'Malaria Test', 100, ''),
(2, 'Full Blood Test', 350, ''),
(3, 'Biochemistry', 0, ''),
(4, 'Hepatitis B', 400, ''),
(5, 'Blood Sugar', 100, ''),
(6, 'HB1ac Assay', 0, ''),
(7, 'rheumatoid factor', 200, ''),
(8, 'HIV test', 200, ''),
(9, 'Stool routine', 200, ''),
(10, 'Stool salmonella', 400, ''),
(11, 'Uric acid assays', 0, ''),
(12, 'Lipid level assays', 0, ''),
(13, 'PSA level assays', 0, ''),
(14, 'Vitamin D assays', 0, ''),
(15, 'Gram staining', 0, ''),
(16, 'ZN stain', 0, ''),
(17, 'Blood grouping', 200, ''),
(18, 'Pregnancy test', 100, ''),
(19, 'Asot test', 300, ''),
(20, 'vdrl', 200, ''),
(22, 'h.pylori', 200, ''),
(23, 'urinalysis', 200, ''),
(24, 'ANC Profile', 900, '');

-- --------------------------------------------------------

--
-- Table structure for table `triage`
--

CREATE TABLE IF NOT EXISTS `triage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NurseID` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `Weight` varchar(255) NOT NULL,
  `diastle` int(11) NOT NULL,
  `systle` int(11) NOT NULL,
  `Temperature` varchar(255) NOT NULL,
  `Height` varchar(255) NOT NULL,
  `dallergies` varchar(255) NOT NULL,
  `food_all` varchar(255) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `OCS` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `urgency` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `PatientID` (`NurseID`,`visitid`),
  KEY `NurseID` (`NurseID`),
  KEY `VisitID` (`visitid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `triage`
--

INSERT INTO `triage` (`id`, `NurseID`, `visitid`, `Weight`, `diastle`, `systle`, `Temperature`, `Height`, `dallergies`, `food_all`, `allergies`, `OCS`, `Date`, `urgency`) VALUES
(1, 57, 2, '100', 157, 96, '35.6', '1.86', '', '', '', 'blocked nose', '2013-07-26 09:16:50', ''),
(2, 57, 3, '72', 127, 86, '35.6', '1.65', '', '', '', 'headache on and off', '2013-07-26 10:56:45', ''),
(3, 57, 4, '65.5', 148, 80, '36.8', '1.8', '', '', '', 'coughing', '2013-07-26 11:37:27', ''),
(4, 57, 5, '83', 127, 79, '36', '1.52', '', '', '', '', '2013-07-26 12:10:35', ''),
(5, 57, 6, '89', 110, 60, '37', '1.5', '', '', '', '', '2013-07-26 12:15:18', ''),
(6, 59, 7, '60', 121, 77, '35.8', '1.55', '', '', '', 'lower adbominal pain on and off', '2013-07-27 08:26:12', ''),
(7, 59, 7, '60', 121, 77, '35.8', '1.55', '', '', '', 'lower adbominal pain on and off', '2013-07-27 08:26:13', ''),
(8, 57, 8, '83', 118, 84, '35.6', '1.55', '', '', '', 'wrist pain in the left hand', '2013-07-27 08:47:00', ''),
(9, 57, 9, '103', 152, 71, '35.6', '1.61', '', '', '', '', '2013-07-27 09:07:53', ''),
(10, 57, 10, '51', 120, 78, '36.2', '1.61', '', '', '', '', '2013-07-27 09:17:54', ''),
(11, 57, 11, '61', 145, 86, '35.2', '1.54', '', '', '', '', '2013-07-27 09:21:04', ''),
(12, 57, 16, '73', 128, 88, '36.2', '1.60', '', '', '', 'headache on and off daily', '2013-07-27 09:33:31', ''),
(13, 57, 19, '58', 144, 80, '36.6', '1.5', '', '', '', 'headache,pain in the chest and eyes', '2013-07-27 09:45:33', ''),
(14, 59, 29, '71', 117, 77, '36.1', '1.56', '', '', '', 'None', '2013-07-27 10:27:14', ''),
(15, 57, 34, '59', 97, 65, '36.3', '1.66', '', '', '', 'none', '2013-07-27 10:44:30', ''),
(16, 57, 31, '55', 100, 69, '36.3', '1.63', '', '', '', 'none', '2013-07-27 10:45:59', ''),
(17, 57, 33, '60', 110, 75, '36.7', '1.8', '', '', '', 'none', '2013-07-27 10:51:46', ''),
(18, 57, 47, '58', 146, 99, '36.2', '1.53', '', '', '', 'high blood pressure', '2013-07-27 10:59:17', ''),
(19, 57, 43, '15', 0, 0, '36.5', '1.1', '', '', '', '', '2013-07-27 12:10:28', ''),
(20, 57, 39, '14', 0, 0, '36.2', '0.97', '', '', '', '', '2013-07-27 12:12:13', ''),
(21, 57, 38, '57', 116, 54, '36.1', '1.64', '', '', '', '', '2013-07-27 12:15:49', ''),
(22, 57, 40, '42', 90, 69, '36.3', '1.67', '', '', '', 'none', '2013-07-27 12:23:07', ''),
(23, 57, 59, '15', 0, 0, '36.2', '1.05', '', '', '', 'none', '2013-07-27 12:24:18', ''),
(24, 57, 64, '61', 137, 73, '36.2', '1.65', '', '', '', 'none', '2013-07-27 12:40:57', ''),
(25, 57, 48, '60', 128, 78, '36.3', '1.62', '', '', '', 'none', '2013-07-27 12:44:03', ''),
(26, 57, 56, '70', 148, 81, '36.3', '1.71', '', '', '', 'none', '2013-07-27 12:54:31', ''),
(27, 57, 53, '86', 123, 79, '36.2', '1.58', '', '', '', '', '2013-07-27 13:00:19', ''),
(28, 57, 54, '14', 0, 0, '36.7', '0.9', '', '', '', '', '2013-07-27 13:02:03', ''),
(29, 57, 58, '16', 0, 0, '36.4', '1.14', '', '', '', '', '2013-07-27 13:07:07', ''),
(30, 59, 62, '51', 125, 84, '36.3', '1.41', '', '', '', '', '2013-07-27 13:12:46', ''),
(31, 57, 61, '61', 139, 82, '36.2', '1.61', '', '', '', '', '2013-07-27 13:13:29', ''),
(32, 57, 65, '15', 0, 0, '36.3', '1.04', '', '', '', '', '2013-07-27 13:20:32', ''),
(33, 57, 62, '43', 117, 70, '36.4', '1.45', '', '', '', '', '2013-07-27 13:23:33', ''),
(34, 57, 63, '63', 119, 81, '36.3', '1.57', '', '', '', '', '2013-07-27 13:28:02', ''),
(35, 57, 70, '81', 137, 82, '36.4', '1.63', '', '', '', '', '2013-07-27 13:33:50', ''),
(36, 59, 72, '101', 137, 83, '36.1', '1.61', '', '', '', '', '2013-07-27 13:35:37', ''),
(37, 57, 81, '74', 139, 85, '36.0', '1.68', '', '', '', '', '2013-07-27 13:36:06', ''),
(38, 57, 50, '61', 104, 76, '36.2', '1.68', '', '', '', '', '2013-07-27 13:39:56', ''),
(39, 59, 73, '91', 152, 85, '36.2', '1.61', '', '', '', '', '2013-07-27 13:42:00', ''),
(40, 57, 71, '101', 140, 85, '36.2', '1.63', '', '', '', '', '2013-07-27 13:46:46', ''),
(41, 59, 66, '62', 101, 95, '36', '1.69', '', '', '', '', '2013-07-27 13:52:46', ''),
(42, 59, 82, '50', 123, 96, '36.2', '1.7', '', '', '', '', '2013-07-27 13:57:27', ''),
(43, 59, 74, '31', 0, 0, '36.1', '1.24', '', '', '', '', '2013-07-27 14:01:14', ''),
(44, 59, 44, '61', 142, 89, '36.1', '1.57', '', '', '', '', '2013-07-27 14:03:46', ''),
(45, 59, 76, '65', 117, 83, '36.3', '1.55', '', '', '', '', '2013-07-27 14:10:36', ''),
(46, 59, 78, '68', 101, 67, '36.5', '1.56', '', '', '', '', '2013-07-27 14:13:43', ''),
(47, 59, 79, '26', 0, 0, '37', '1.25', '', '', '', '', '2013-07-27 14:14:33', ''),
(48, 59, 86, '61', 135, 71, '36.2', '1.7', '', '', '', '', '2013-07-27 14:16:16', ''),
(49, 59, 80, '5.9', 0, 0, '36.4', '0.54', '', '', '', '', '2013-07-27 14:21:52', ''),
(50, 59, 87, '49', 151, 95, '36.2', '1.65', '', '', '', '', '2013-07-27 14:24:06', ''),
(51, 59, 88, '57', 113, 69, '36.5', '1.5', '', '', '', '', '2013-07-27 14:30:40', ''),
(52, 59, 89, '14', 0, 0, '36.2', '1.12', '', '', '', '', '2013-07-27 14:34:36', ''),
(53, 59, 90, '22', 0, 0, '36.3', '1.23', '', '', '', '', '2013-07-27 14:38:06', ''),
(54, 59, 91, '84', 135, 74, '36.3', '1.53', '', '', '', '', '2013-07-27 14:42:43', ''),
(55, 59, 92, '59', 118, 78, '36.2', '1.56', '', '', '', '', '2013-07-27 14:43:56', ''),
(56, 59, 93, '72', 119, 76, '36.3', '1.62', '', '', '', '', '2013-07-27 14:49:21', ''),
(57, 59, 94, '40', 146, 86, '36.2', '1.55', '', '', '', '', '2013-07-27 14:54:53', ''),
(58, 59, 95, '16', 0, 0, '36.2', '1.12', '', '', '', '', '2013-07-27 14:56:27', ''),
(59, 59, 96, '8.8', 0, 0, '36', '0.56', '', '', '', '', '2013-07-27 14:58:29', ''),
(60, 59, 98, '35', 0, 0, '36', '1.34', '', '', '', '', '2013-07-27 15:18:47', ''),
(61, 59, 100, '36', 0, 0, '37.3', '1.43', '', '', '', '', '2013-07-27 15:21:19', ''),
(62, 59, 102, '30', 0, 0, '36.2', '1.12', '', '', '', '', '2013-07-27 15:24:48', ''),
(63, 59, 101, '57', 123, 88, '36.4', '1.52', '', '', '', '', '2013-07-27 15:30:08', ''),
(64, 59, 103, '43', 0, 0, '36.2', '1.54', '', '', '', '', '2013-07-27 15:31:13', ''),
(65, 59, 105, '63', 115, 74, '36.4', '1.81', '', '', '', '', '2013-07-27 15:34:03', ''),
(66, 59, 106, '59', 130, 72, '36.3', '1.73', '', '', '', '', '2013-07-27 15:36:23', ''),
(67, 59, 107, '60', 97, 66, '36.4', '1.61', '', '', '', '', '2013-07-27 15:39:45', ''),
(68, 59, 108, '76', 101, 87, '36.2', '1.61', '', '', '', '', '2013-07-27 15:44:24', ''),
(69, 59, 109, '77', 131, 82, '36.2', '1.58', '', '', '', '', '2013-07-27 15:47:24', ''),
(70, 59, 110, '39', 0, 0, '36.2', '1.51', '', '', '', '', '2013-07-27 15:49:59', ''),
(71, 59, 111, '58', 103, 70, '36.2', '1.59', '', '', '', '', '2013-07-27 15:56:06', ''),
(72, 59, 112, '63', 109, 73, '36.1', '1.61', '', '', '', '', '2013-07-27 15:59:14', ''),
(73, 59, 113, '68', 134, 67, '36.2', '1.58', '', '', '', '', '2013-07-27 16:07:35', ''),
(74, 59, 114, '36', 0, 0, '36.1', '1.32', '', '', '', '', '2013-07-27 16:09:42', ''),
(75, 59, 116, '97', 115, 77, '36.2', '1.65', '', '', '', '', '2013-07-27 16:12:37', ''),
(76, 57, 117, '67', 123, 88, '36.4', '1.62', '', '', '', '', '2013-07-27 16:43:09', ''),
(77, 59, 118, '56', 116, 86, '36.2', '1.66', '', '', '', '', '2013-07-27 17:21:11', ''),
(78, 57, 119, '100', 131, 88, '36.4', '1.64', '', '', '', 'bachache', '2013-07-29 10:45:49', ''),
(79, 57, 120, '59', 124, 73, '36.1', '1.53', '', '', '', 'chest pain', '2013-07-29 12:17:03', ''),
(80, 57, 122, '66', 116, 73, '36.4', '1.72', '', '', '', '', '2013-07-30 14:16:07', ''),
(81, 57, 124, '62', 117, 72, '36', '1.54', '', '', '', '', '2013-07-31 13:33:37', ''),
(82, 57, 126, '63.5', 141, 95, '36.2', '1.61', '', '', '', 'chills', '2013-08-08 11:39:55', ''),
(83, 57, 127, '80', 143, 83, '35.6', '1.71', '', '', '', '', '2013-08-13 06:53:55', ''),
(84, 57, 128, '95', 137, 85, '36.1', '1.88', '', '', '', '', '2013-08-13 08:50:22', ''),
(85, 57, 129, '70', 121, 74, '35.6', '1.58', '', '', '', '', '2013-08-13 10:48:47', ''),
(86, 57, 132, '79', 110, 64, '35.8', '1.73', '', '', '', '', '2013-08-13 10:49:54', ''),
(87, 57, 131, '57', 160, 79, '36.0', '1.66', '', '', '', '', '2013-08-13 10:50:52', ''),
(88, 57, 130, '67', 132, 76, '37', '1.57', '', '', '', '', '2013-08-13 10:52:43', ''),
(89, 57, 133, '65', 143, 94, '36', '1.58', '', '', '', '', '2013-08-13 10:53:38', ''),
(91, 57, 136, '60', 130, 75, '36', '1.54', '', '', '', '', '2013-08-16 09:54:55', ''),
(95, 61, 142, '89', 120, 90, '34', '1.6', '', '', '', '', '2013-08-28 06:05:39', ''),
(96, 61, 139, '88', 120, 90, '33', '1.7', '', '', '', 'none', '2013-08-29 09:02:23', ''),
(115, 61, 144, '34', 122, 34, '35', '1.6', '', '', '', '', '2013-08-29 19:58:17', ''),
(116, 61, 145, '23', 112, 56, '36', '1.6', '', '', '', '', '2013-08-29 20:04:51', ''),
(117, 61, 147, '56', 112, 80, '45', '1.5', '', '', '', '', '2013-08-30 03:02:08', ''),
(118, 61, 148, '45', 110, 80, '34', '1.5', '', '', '', '', '2013-08-30 03:11:06', ''),
(122, 61, 150, '34', 111, 80, '36', '1.5', '', '', '', '', '2013-08-30 05:38:34', ''),
(123, 61, 153, '57', 160, 90, '40', '2', '', '', '', '', '2013-08-30 07:11:08', ''),
(124, 61, 154, '34', 110, 80, '34', '1.5', '', '', '', '', '2013-08-30 09:09:09', ''),
(125, 61, 155, '78', 120, 90, '36', '1.7', '', '', '', 'none', '2013-09-02 18:19:28', ''),
(126, 61, 156, '78', 120, 90, '38', '1.7', '', '', '', 'none', '2013-09-02 18:47:49', ''),
(127, 69, 157, '89', 120, 90, '36', '1.8', '', '', '', 'none', '2013-09-05 08:24:50', ''),
(128, 69, 160, '89', 120, 90, '36', '1.7', '', '', '', 'none', '2013-09-11 16:52:02', ''),
(129, 65, 161, '56', 120, 90, '33', '1.5', '', '', '', 'none', '2013-09-11 17:11:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientid` int(11) NOT NULL,
  `VisitDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nq` enum('active','in-active') NOT NULL DEFAULT 'active',
  `nstart` time NOT NULL,
  `nend` time NOT NULL,
  `dq` enum('active','in-active') NOT NULL DEFAULT 'in-active',
  `dstart` time NOT NULL,
  `dend` time NOT NULL,
  `lq` enum('active','in-active') NOT NULL DEFAULT 'in-active',
  `lstart` time NOT NULL,
  `lend` time NOT NULL,
  `pq` enum('active','in-active') NOT NULL DEFAULT 'in-active',
  `pstart` time NOT NULL,
  `pend` time NOT NULL,
  `rq` enum('active','in-active') NOT NULL DEFAULT 'active',
  `urgency` varchar(255) NOT NULL,
  `results` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `patientid` (`patientid`),
  KEY `packageid` (`rq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=179 ;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`id`, `patientid`, `VisitDate`, `nq`, `nstart`, `nend`, `dq`, `dstart`, `dend`, `lq`, `lstart`, `lend`, `pq`, `pstart`, `pend`, `rq`, `urgency`, `results`) VALUES
(1, 13, '2013-07-25 15:44:01', 'in-active', '14:56:24', '15:44:01', 'active', '15:44:01', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(2, 14, '2013-07-26 10:11:58', 'in-active', '09:09:50', '09:21:51', 'in-active', '09:21:51', '10:11:58', 'active', '10:11:58', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(3, 15, '2013-07-26 15:19:42', 'in-active', '10:50:17', '10:56:58', 'in-active', '11:25:40', '11:35:48', 'in-active', '11:24:29', '11:25:40', 'in-active', '11:35:48', '15:19:42', 'active', '0', ''),
(4, 16, '2013-07-26 15:19:48', 'in-active', '11:27:49', '11:37:33', 'in-active', '12:04:04', '12:10:37', 'in-active', '12:02:51', '12:04:04', 'in-active', '12:10:37', '15:19:48', 'active', '0', ''),
(5, 2, '2013-07-26 15:19:37', 'in-active', '12:06:19', '12:11:52', 'in-active', '12:11:52', '12:19:32', 'in-active', '00:00:00', '00:00:00', 'in-active', '12:19:32', '15:19:37', 'active', '0', ''),
(6, 4, '2013-07-26 12:16:57', 'in-active', '12:14:10', '12:16:57', 'active', '12:16:57', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(7, 18, '2013-07-27 10:15:12', 'in-active', '08:17:59', '08:26:19', 'in-active', '09:38:13', '10:15:12', 'in-active', '08:52:49', '09:38:13', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(8, 21, '2013-07-27 12:42:41', 'in-active', '08:41:54', '08:47:07', 'in-active', '09:55:11', '11:02:19', 'in-active', '09:14:27', '09:55:11', 'in-active', '11:02:19', '12:42:41', 'active', '0', ''),
(9, 22, '2013-07-27 10:44:17', 'in-active', '09:02:32', '09:08:00', 'in-active', '10:06:58', '10:30:29', 'in-active', '09:25:21', '10:06:58', 'in-active', '10:30:29', '10:44:17', 'active', '0', ''),
(10, 24, '2013-07-27 09:32:36', 'in-active', '09:12:42', '09:18:09', 'in-active', '09:18:09', '09:32:36', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(11, 23, '2013-07-27 09:55:18', 'in-active', '09:13:01', '09:21:11', 'in-active', '09:21:11', '09:49:50', 'in-active', '00:00:00', '00:00:00', 'in-active', '09:49:50', '09:55:18', 'active', '0', ''),
(12, 25, '2013-07-27 10:27:24', 'in-active', '09:17:21', '09:25:00', 'in-active', '09:25:00', '10:12:28', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:12:28', '10:27:24', 'active', '', ''),
(13, 26, '2013-07-27 10:32:58', 'in-active', '09:19:33', '09:26:44', 'in-active', '09:26:44', '10:10:59', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:10:59', '10:32:58', 'active', '', ''),
(14, 27, '2013-07-27 10:11:29', 'in-active', '09:23:47', '09:33:17', 'in-active', '09:33:17', '10:07:31', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:07:31', '10:11:29', 'active', '', ''),
(15, 28, '2013-07-27 10:54:25', 'in-active', '09:23:51', '09:36:57', 'in-active', '09:36:57', '10:21:48', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:21:48', '10:54:25', 'active', '', ''),
(16, 20, '2013-07-27 10:14:28', 'in-active', '09:24:58', '09:33:39', 'in-active', '09:33:39', '10:05:07', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:05:07', '10:14:28', 'active', '0', ''),
(17, 19, '2013-07-27 11:56:28', 'in-active', '09:25:33', '09:38:39', 'in-active', '09:38:39', '10:52:46', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:52:46', '11:56:28', 'active', '', ''),
(18, 29, '2013-07-27 14:03:21', 'in-active', '09:30:44', '09:43:55', 'in-active', '09:43:55', '14:03:21', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(19, 30, '2013-07-27 11:01:44', 'in-active', '09:34:12', '09:45:41', 'in-active', '09:45:41', '11:01:44', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(20, 31, '2013-07-27 12:36:20', 'in-active', '09:40:54', '09:46:54', 'in-active', '09:46:54', '12:34:02', 'in-active', '00:00:00', '00:00:00', 'in-active', '12:34:02', '12:36:20', 'active', '', ''),
(21, 32, '2013-07-27 12:36:52', 'in-active', '09:43:52', '09:48:44', 'in-active', '09:48:44', '12:27:57', 'in-active', '00:00:00', '00:00:00', 'in-active', '12:27:57', '12:36:52', 'active', '', ''),
(22, 33, '2013-07-27 13:00:20', 'in-active', '09:46:24', '09:49:19', 'in-active', '09:49:19', '12:54:33', 'in-active', '00:00:00', '00:00:00', 'in-active', '12:54:33', '13:00:20', 'active', '', ''),
(23, 34, '2013-07-27 15:07:00', 'in-active', '09:48:57', '09:53:07', 'in-active', '13:13:44', '14:44:46', 'in-active', '12:59:59', '13:13:44', 'in-active', '14:44:46', '15:07:00', 'active', '', ''),
(24, 35, '2013-07-27 12:46:21', 'in-active', '09:58:25', '10:02:36', 'in-active', '10:27:22', '12:41:46', 'in-active', '10:18:19', '10:27:22', 'in-active', '12:41:46', '12:46:21', 'active', '', ''),
(25, 36, '2013-07-27 10:52:08', 'in-active', '10:04:20', '10:09:48', 'in-active', '10:09:48', '10:50:24', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:50:24', '10:52:08', 'active', '', ''),
(26, 37, '2013-07-27 10:33:19', 'in-active', '10:10:53', '10:13:42', 'in-active', '10:13:42', '10:25:01', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:25:01', '10:33:19', 'active', '', ''),
(27, 38, '2013-07-27 13:07:03', 'in-active', '10:15:32', '10:23:38', 'in-active', '10:23:38', '13:07:03', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(28, 40, '2013-07-27 13:12:33', 'in-active', '10:20:04', '10:42:03', 'in-active', '10:42:03', '13:01:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:01:00', '13:12:33', 'active', '', ''),
(29, 39, '2013-07-27 10:43:08', 'in-active', '10:20:34', '10:27:20', 'in-active', '10:27:20', '10:38:04', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:38:04', '10:43:08', 'active', '0', ''),
(30, 41, '2013-07-27 15:35:51', 'in-active', '10:22:34', '10:44:58', 'in-active', '10:44:58', '15:35:51', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(31, 42, '2013-07-27 12:43:24', 'in-active', '10:24:03', '10:46:07', 'in-active', '10:46:07', '11:01:03', 'in-active', '00:00:00', '00:00:00', 'in-active', '11:01:03', '12:43:24', 'active', '0', ''),
(32, 43, '2013-07-27 13:15:05', 'in-active', '10:25:06', '10:49:41', 'in-active', '10:49:41', '13:12:21', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:12:21', '13:15:05', 'active', '', ''),
(33, 44, '2013-07-27 13:39:48', 'in-active', '10:27:41', '10:51:53', 'in-active', '10:51:53', '13:39:48', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(34, 45, '2013-07-27 12:53:00', 'in-active', '10:28:00', '10:44:38', 'in-active', '10:44:38', '12:52:33', 'in-active', '00:00:00', '00:00:00', 'in-active', '12:52:33', '12:53:00', 'active', '0', ''),
(35, 46, '2013-07-27 15:16:49', 'in-active', '10:30:01', '12:34:08', 'in-active', '14:18:37', '15:02:20', 'in-active', '13:39:43', '14:18:37', 'in-active', '15:02:20', '15:16:49', 'active', '', ''),
(36, 48, '2013-07-27 13:59:11', 'in-active', '10:31:43', '12:08:23', 'in-active', '12:08:23', '13:53:20', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:53:20', '13:59:11', 'active', '', ''),
(37, 47, '2013-07-27 13:46:16', 'in-active', '10:31:44', '12:16:05', 'in-active', '12:16:05', '13:30:09', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:30:09', '13:46:16', 'active', '', ''),
(38, 49, '2013-07-27 13:35:39', 'in-active', '10:36:07', '12:15:56', 'in-active', '12:15:56', '13:34:24', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:34:24', '13:35:39', 'active', '0', ''),
(39, 50, '2013-07-27 13:59:43', 'in-active', '10:37:43', '12:12:20', 'in-active', '12:12:20', '13:57:43', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:57:43', '13:59:43', 'active', '0', ''),
(40, 51, '2013-07-27 14:18:17', 'in-active', '10:40:35', '12:23:14', 'in-active', '12:23:14', '14:18:17', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(41, 52, '2013-07-27 14:10:33', 'in-active', '10:43:32', '12:38:00', 'in-active', '12:38:00', '14:03:14', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:03:14', '14:10:33', 'active', '', ''),
(42, 53, '2013-07-27 13:47:34', 'in-active', '10:44:55', '12:40:42', 'in-active', '12:40:42', '13:43:05', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:43:05', '13:47:34', 'active', '', ''),
(43, 54, '2013-07-27 13:21:36', 'in-active', '10:45:54', '12:10:35', 'in-active', '12:10:35', '13:18:12', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:18:12', '13:21:36', 'active', '0', ''),
(44, 55, '2013-07-27 14:37:38', 'in-active', '10:48:01', '14:03:50', 'in-active', '14:03:50', '14:21:43', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:21:43', '14:37:38', 'active', '0', ''),
(45, 56, '2013-07-27 14:49:16', 'in-active', '10:49:39', '12:28:31', 'in-active', '12:28:31', '14:29:01', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:29:01', '14:49:16', 'active', '', ''),
(46, 57, '2013-07-27 14:44:45', 'in-active', '10:52:44', '12:48:57', 'in-active', '12:48:57', '14:20:11', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:20:11', '14:44:45', 'active', '', ''),
(47, 58, '2013-07-27 13:51:54', 'in-active', '10:55:03', '10:59:24', 'in-active', '10:59:24', '12:22:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '12:22:00', '13:51:54', 'active', '0', ''),
(48, 59, '2013-07-27 14:08:38', 'in-active', '10:55:38', '12:44:26', 'in-active', '12:44:26', '14:00:15', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:00:15', '14:08:38', 'active', '0', ''),
(49, 60, '2013-07-27 15:35:55', 'in-active', '11:00:35', '12:50:36', 'in-active', '12:50:36', '15:35:55', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(50, 61, '2013-07-27 15:37:49', 'in-active', '11:02:04', '13:40:02', 'in-active', '13:40:02', '15:32:25', 'in-active', '00:00:00', '00:00:00', 'in-active', '15:32:25', '15:37:49', 'active', '0', ''),
(51, 62, '2013-07-27 14:19:47', 'in-active', '11:03:24', '12:53:43', 'in-active', '12:53:43', '14:19:47', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(52, 64, '2013-07-27 15:36:01', 'in-active', '11:59:31', '12:56:07', 'in-active', '12:56:07', '15:36:01', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(53, 65, '2013-07-27 14:25:38', 'in-active', '12:10:51', '13:00:27', 'in-active', '13:00:27', '14:13:32', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:13:32', '14:25:38', 'active', '0', ''),
(54, 66, '2013-07-27 14:16:02', 'in-active', '12:12:10', '13:02:14', 'in-active', '13:02:14', '14:16:02', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(55, 67, '2013-07-27 15:36:05', 'in-active', '12:12:44', '13:03:04', 'in-active', '13:03:04', '15:36:05', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(56, 68, '2013-07-27 13:26:33', 'in-active', '12:14:57', '12:54:38', 'in-active', '12:54:38', '13:25:26', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:25:26', '13:26:33', 'active', '0', ''),
(57, 69, '2013-07-27 14:39:32', 'in-active', '12:15:09', '12:58:58', 'active', '14:39:32', '14:26:03', 'in-active', '14:26:03', '14:39:32', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(58, 70, '2013-07-27 14:59:19', 'in-active', '12:15:19', '13:07:17', 'in-active', '13:07:17', '14:31:33', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:31:33', '14:59:19', 'active', '0', ''),
(59, 71, '2013-07-27 13:46:50', 'in-active', '12:20:06', '12:24:24', 'in-active', '12:24:24', '13:41:23', 'in-active', '00:00:00', '00:00:00', 'in-active', '13:41:23', '13:46:50', 'active', '0', ''),
(60, 72, '2013-07-27 15:34:42', 'in-active', '12:20:44', '13:05:16', 'in-active', '13:05:16', '15:30:27', 'in-active', '00:00:00', '00:00:00', 'in-active', '15:30:27', '15:34:42', 'active', '', ''),
(61, 73, '2013-07-27 16:29:32', 'in-active', '12:21:26', '13:14:02', 'in-active', '15:31:45', '16:29:32', 'in-active', '15:00:41', '15:31:45', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(62, 74, '2013-07-27 14:55:20', 'in-active', '12:23:03', '13:23:39', 'in-active', '13:23:39', '14:46:47', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:46:47', '14:55:20', 'active', '0', ''),
(63, 76, '2013-07-27 15:51:07', 'in-active', '12:25:40', '13:28:10', 'in-active', '13:28:10', '15:14:30', 'in-active', '00:00:00', '00:00:00', 'in-active', '15:14:30', '15:51:07', 'active', '0', ''),
(64, 75, '2013-07-27 15:18:01', 'in-active', '12:29:32', '12:41:09', 'in-active', '14:30:20', '15:05:52', 'in-active', '13:46:58', '14:30:20', 'in-active', '15:05:52', '15:18:01', 'active', '0', ''),
(65, 79, '2013-07-27 14:52:45', 'in-active', '12:29:50', '13:20:56', 'in-active', '13:20:56', '14:31:30', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:31:30', '14:52:45', 'active', '0', ''),
(66, 78, '2013-07-27 15:36:33', 'in-active', '12:29:51', '13:52:55', 'in-active', '13:52:55', '15:36:33', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(67, 80, '2013-07-27 12:30:47', 'active', '12:30:47', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(68, 81, '2013-07-27 12:33:49', 'active', '12:33:49', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(69, 82, '2013-07-27 15:25:57', 'in-active', '12:34:43', '13:19:10', 'in-active', '14:15:05', '14:51:52', 'in-active', '13:43:51', '14:15:05', 'in-active', '14:51:52', '15:25:57', 'active', '', ''),
(70, 83, '2013-07-27 16:14:33', 'in-active', '12:35:00', '13:33:57', 'in-active', '13:33:57', '16:00:58', 'in-active', '00:00:00', '00:00:00', 'in-active', '16:00:58', '16:14:33', 'active', '0', ''),
(71, 85, '2013-07-27 13:58:38', 'in-active', '12:42:27', '13:46:52', 'in-active', '13:46:52', '13:58:38', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(72, 84, '2013-07-27 15:05:32', 'in-active', '12:42:36', '13:35:42', 'in-active', '13:35:42', '14:45:22', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:45:22', '15:05:32', 'active', '0', ''),
(73, 86, '2013-07-27 15:01:02', 'in-active', '12:48:51', '13:42:05', 'in-active', '13:42:05', '14:36:34', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:36:34', '15:01:02', 'active', 'urgent', ''),
(74, 87, '2013-07-27 16:29:59', 'in-active', '12:57:59', '14:01:19', 'active', '16:29:59', '16:26:45', 'in-active', '16:26:45', '16:29:59', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(75, 88, '2013-07-27 13:02:07', 'active', '13:02:07', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(76, 89, '2013-07-27 15:36:48', 'in-active', '13:04:35', '14:10:41', 'in-active', '14:10:41', '15:36:48', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(77, 90, '2013-07-27 15:36:38', 'in-active', '13:05:20', '13:54:37', 'in-active', '13:54:37', '15:36:38', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(78, 91, '2013-07-27 15:31:24', 'in-active', '13:10:47', '14:13:48', 'in-active', '14:13:48', '15:31:24', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(79, 92, '2013-07-27 15:45:00', 'in-active', '13:16:22', '14:14:41', 'in-active', '14:14:41', '15:16:57', 'in-active', '00:00:00', '00:00:00', 'in-active', '15:16:57', '15:45:00', 'active', '0', ''),
(80, 56, '2013-07-27 14:21:57', 'in-active', '13:18:44', '14:21:57', 'active', '14:21:57', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(81, 93, '2013-07-27 16:33:44', 'in-active', '13:29:33', '13:36:56', 'in-active', '15:51:32', '16:32:56', 'in-active', '15:22:55', '15:51:32', 'in-active', '16:32:56', '16:33:44', 'active', '0', ''),
(82, 94, '2013-07-27 15:57:57', 'in-active', '13:33:07', '13:57:34', 'active', '13:57:34', '15:36:43', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(83, 95, '2013-07-27 13:37:57', 'active', '13:37:57', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(84, 96, '2013-07-27 15:21:52', 'in-active', '13:43:23', '13:49:35', 'in-active', '13:49:35', '14:51:35', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:51:35', '15:21:52', 'active', '', ''),
(85, 97, '2013-07-27 15:39:38', 'in-active', '14:08:09', '14:21:05', 'in-active', '14:21:05', '15:39:38', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(86, 98, '2013-07-27 15:42:53', 'in-active', '14:12:04', '14:16:21', 'in-active', '14:16:21', '15:37:47', 'in-active', '00:00:00', '00:00:00', 'in-active', '15:37:47', '15:42:53', 'active', '0', ''),
(87, 99, '2013-07-27 15:13:32', 'in-active', '14:19:50', '14:24:11', 'in-active', '14:24:11', '14:41:09', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:41:09', '15:13:32', 'active', '0', ''),
(88, 100, '2013-07-27 16:23:23', 'in-active', '14:28:00', '14:31:09', 'in-active', '14:31:09', '16:23:23', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(89, 101, '2013-07-27 15:15:27', 'in-active', '14:30:33', '14:35:32', 'in-active', '14:35:32', '14:59:33', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:59:33', '15:15:27', 'active', '0', ''),
(90, 102, '2013-07-27 15:40:59', 'in-active', '14:33:30', '14:38:22', 'in-active', '14:38:22', '15:34:17', 'in-active', '00:00:00', '00:00:00', 'in-active', '15:34:17', '15:40:59', 'active', '0', ''),
(91, 103, '2013-07-27 14:42:53', 'in-active', '14:36:59', '14:42:53', 'active', '14:42:53', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(92, 104, '2013-07-27 15:14:59', 'in-active', '14:39:07', '14:44:22', 'in-active', '14:44:22', '14:55:40', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:55:40', '15:14:59', 'active', '0', ''),
(93, 105, '2013-07-27 17:20:16', 'in-active', '14:41:59', '14:49:36', 'in-active', '16:01:28', '17:18:24', 'in-active', '15:47:00', '16:01:28', 'in-active', '17:18:24', '17:20:16', 'active', '0', ''),
(94, 106, '2013-07-27 17:38:08', 'in-active', '14:50:42', '14:55:13', 'in-active', '17:24:09', '17:30:29', 'in-active', '17:04:07', '17:24:09', 'in-active', '17:30:29', '17:38:08', 'active', '0', ''),
(95, 107, '2013-07-27 17:25:03', 'in-active', '14:53:16', '14:56:50', 'active', '17:25:03', '16:48:11', 'in-active', '16:48:11', '17:25:03', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(96, 108, '2013-07-27 14:59:46', 'in-active', '14:55:29', '14:59:46', 'active', '14:59:46', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(97, 109, '2013-07-27 14:58:58', 'active', '14:58:58', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(98, 110, '2013-07-27 16:11:14', 'in-active', '15:02:59', '15:18:57', 'in-active', '15:18:57', '16:10:12', 'in-active', '00:00:00', '00:00:00', 'in-active', '16:10:12', '16:11:14', 'active', '0', ''),
(99, 111, '2013-07-27 16:26:34', 'in-active', '15:10:31', '15:16:53', 'in-active', '15:16:53', '16:26:34', 'active', '16:26:34', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(100, 112, '2013-07-27 16:59:40', 'in-active', '15:19:37', '15:23:08', 'in-active', '15:23:08', '16:58:19', 'in-active', '00:00:00', '00:00:00', 'in-active', '16:58:19', '16:59:40', 'active', '0', ''),
(101, 113, '2013-07-27 16:50:19', 'in-active', '15:22:00', '15:30:15', 'in-active', '15:30:15', '16:50:19', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(102, 114, '2013-07-27 16:14:02', 'in-active', '15:23:39', '15:27:27', 'in-active', '15:27:27', '16:14:02', 'in-active', '00:00:00', '00:00:00', 'in-active', '15:50:32', '15:57:34', 'active', '0', ''),
(103, 115, '2013-07-27 15:31:23', 'in-active', '15:26:20', '15:31:23', 'active', '15:31:23', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(104, 116, '2013-07-27 15:28:35', 'active', '15:28:35', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(105, 117, '2013-07-27 17:29:23', 'in-active', '15:30:59', '15:34:11', 'in-active', '15:34:11', '17:27:10', 'in-active', '00:00:00', '00:00:00', 'in-active', '17:27:10', '17:29:23', 'active', '0', ''),
(106, 118, '2013-07-27 17:38:30', 'in-active', '15:33:22', '15:36:32', 'in-active', '15:36:32', '17:36:55', 'in-active', '00:00:00', '00:00:00', 'in-active', '17:36:55', '17:38:30', 'active', '0', ''),
(107, 119, '2013-07-27 17:15:03', 'in-active', '15:36:03', '15:39:56', 'in-active', '15:39:56', '17:12:50', 'in-active', '00:00:00', '00:00:00', 'in-active', '17:12:50', '17:15:03', 'active', '0', ''),
(108, 120, '2013-07-27 17:08:55', 'in-active', '15:38:16', '15:44:31', 'in-active', '15:44:31', '17:06:04', 'in-active', '00:00:00', '00:00:00', 'in-active', '17:06:04', '17:08:55', 'active', '0', ''),
(109, 121, '2013-07-27 15:47:32', 'in-active', '15:39:59', '15:47:32', 'active', '15:47:32', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(110, 122, '2013-07-27 15:50:06', 'in-active', '15:42:30', '15:50:06', 'active', '15:50:06', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(111, 123, '2013-07-27 16:29:55', 'in-active', '15:45:09', '15:56:20', 'in-active', '15:56:20', '16:21:57', 'in-active', '00:00:00', '00:00:00', 'in-active', '16:21:57', '16:29:55', 'active', '0', ''),
(112, 124, '2013-07-27 16:21:08', 'in-active', '15:48:17', '15:59:21', 'in-active', '15:59:21', '16:19:41', 'in-active', '00:00:00', '00:00:00', 'in-active', '16:19:41', '16:21:08', 'active', '0', ''),
(113, 125, '2013-07-27 16:53:52', 'in-active', '15:51:07', '16:07:44', 'in-active', '16:07:44', '16:48:58', 'in-active', '00:00:00', '00:00:00', 'in-active', '16:48:58', '16:53:52', 'active', '0', ''),
(114, 126, '2013-07-27 16:57:31', 'in-active', '15:53:10', '16:09:50', 'in-active', '16:09:50', '16:53:02', 'in-active', '00:00:00', '00:00:00', 'in-active', '16:53:02', '16:57:31', 'active', '0', ''),
(115, 127, '2013-07-27 15:56:06', 'active', '15:56:06', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(116, 128, '2013-07-27 17:19:14', 'in-active', '15:58:47', '16:12:43', 'in-active', '16:12:43', '17:16:56', 'in-active', '00:00:00', '00:00:00', 'in-active', '17:16:56', '17:19:14', 'active', '0', ''),
(117, 113, '2013-07-27 16:43:15', 'in-active', '16:41:01', '16:43:15', 'active', '16:43:15', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(118, 97, '2013-07-27 17:33:59', 'in-active', '17:18:45', '17:21:16', 'in-active', '17:21:16', '17:33:59', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(119, 85, '2013-07-29 11:57:23', 'in-active', '10:41:19', '10:45:58', 'active', '11:57:23', '11:12:21', 'in-active', '11:12:21', '11:57:23', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(120, 30, '2013-07-29 14:12:28', 'in-active', '12:13:36', '12:17:10', 'in-active', '12:39:36', '14:12:28', 'in-active', '12:29:27', '12:39:36', 'active', '12:56:24', '00:00:00', 'active', '0', ''),
(122, 130, '2013-07-30 15:00:54', 'in-active', '13:32:02', '14:16:15', 'in-active', '14:16:15', '14:24:38', 'in-active', '00:00:00', '00:00:00', 'in-active', '14:24:38', '15:00:54', 'active', '0', ''),
(123, 130, '2013-07-30 14:42:40', 'in-active', '13:32:56', '14:19:13', 'in-active', '14:19:13', '14:42:40', 'active', '14:42:40', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(124, 131, '2013-07-31 15:11:32', 'in-active', '13:25:19', '13:33:44', 'in-active', '14:44:28', '15:03:26', 'in-active', '14:18:01', '14:44:28', 'in-active', '15:03:26', '15:11:32', 'active', '0', 'Lab results ready'),
(125, 132, '2013-08-01 13:00:27', 'in-active', '12:01:38', '12:07:55', 'in-active', '12:49:01', '12:55:34', 'in-active', '12:25:43', '12:49:01', 'in-active', '12:55:34', '13:00:27', 'active', '', 'Lab results ready'),
(126, 133, '2013-08-08 12:23:18', 'in-active', '11:32:08', '11:40:03', 'active', '12:23:18', '12:02:01', 'in-active', '11:45:46', '12:23:18', 'active', '12:02:01', '00:00:00', 'active', '0', 'Lab results ready'),
(127, 134, '2013-08-13 07:36:16', 'in-active', '06:50:48', '06:54:00', 'in-active', '07:21:47', '07:25:38', 'in-active', '07:00:00', '07:21:47', 'in-active', '07:25:38', '07:36:16', 'active', '0', 'Lab results ready'),
(128, 135, '2013-08-15 09:46:18', 'in-active', '08:48:03', '08:50:28', 'in-active', '08:50:28', '09:46:18', 'active', '09:41:47', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(129, 136, '2013-08-15 14:55:35', 'in-active', '09:07:40', '10:48:53', 'in-active', '10:48:53', '14:55:35', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(130, 137, '2013-08-15 14:56:04', 'in-active', '09:34:17', '10:52:49', 'in-active', '10:52:49', '14:56:04', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(131, 138, '2013-08-15 09:51:54', 'in-active', '10:05:31', '10:50:59', 'in-active', '10:50:59', '09:51:54', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(132, 139, '2013-08-15 10:16:37', 'in-active', '10:08:37', '10:50:00', 'in-active', '10:50:00', '10:16:37', 'active', '09:57:09', '00:00:00', 'active', '10:00:45', '00:00:00', 'active', '0', ''),
(133, 140, '2013-08-13 10:53:44', 'in-active', '10:15:44', '10:53:44', 'active', '10:53:44', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(134, 141, '2013-08-16 06:58:37', 'in-active', '06:56:19', '06:58:37', 'active', '06:58:37', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(135, 129, '2013-08-29 20:09:40', 'in-active', '09:42:56', '22:08:49', 'in-active', '22:08:49', '22:09:40', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(136, 142, '2013-08-16 10:38:01', 'in-active', '09:54:05', '09:55:01', 'in-active', '09:55:01', '10:27:57', 'in-active', '00:00:00', '00:00:00', 'in-active', '10:27:57', '10:38:01', 'active', 'urgent', ''),
(137, 143, '2013-08-29 20:09:31', 'in-active', '14:06:24', '22:08:35', 'in-active', '22:08:35', '22:09:31', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(138, 144, '2013-08-29 20:09:35', 'in-active', '12:33:34', '22:08:39', 'in-active', '22:08:39', '22:09:35', 'in-active', '00:00:00', '00:00:00', 'in-active', '12:50:28', '13:02:35', 'active', '', ''),
(139, 145, '2013-08-29 20:09:22', 'in-active', '13:41:49', '11:05:01', 'in-active', '11:05:01', '22:09:22', 'in-active', '13:49:08', '14:14:47', 'in-active', '14:22:54', '14:28:23', 'active', 'urgent', 'Lab results ready'),
(140, 146, '2013-08-29 20:31:37', 'in-active', '10:11:20', '22:08:43', 'in-active', '22:08:43', '22:09:45', 'in-active', '11:11:31', '11:32:26', 'in-active', '13:19:50', '22:31:37', 'active', '', 'Lab results ready'),
(141, 147, '2013-08-29 20:09:55', 'in-active', '11:21:00', '22:08:59', 'in-active', '22:08:59', '22:09:55', 'in-active', '00:00:00', '00:00:00', 'active', '21:56:12', '00:00:00', 'active', '', ''),
(142, 4, '2013-08-29 20:31:30', 'in-active', '08:01:20', '22:08:54', 'in-active', '22:08:54', '22:09:49', 'in-active', '00:00:00', '00:00:00', 'in-active', '08:12:55', '22:31:30', 'active', '0', ''),
(143, 148, '2013-08-29 20:10:01', 'in-active', '21:53:03', '22:09:04', 'in-active', '22:09:04', '22:10:01', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(144, 2, '2013-08-29 20:00:31', 'in-active', '21:57:41', '21:58:53', 'in-active', '21:58:53', '21:59:37', 'in-active', '00:00:00', '00:00:00', 'in-active', '21:59:37', '22:00:31', 'active', '0', ''),
(145, 149, '2013-08-29 20:30:52', 'in-active', '22:07:37', '22:26:38', 'in-active', '22:29:01', '22:30:01', 'in-active', '22:28:15', '22:29:01', 'in-active', '22:30:01', '22:30:52', 'active', '0', 'Lab results ready'),
(146, 130, '2013-08-29 20:40:21', 'active', '22:40:21', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(147, 15, '2013-08-30 03:07:50', 'in-active', '04:57:17', '05:02:22', 'in-active', '05:04:45', '05:05:14', 'in-active', '05:03:37', '05:04:45', 'in-active', '05:05:14', '05:07:50', 'active', '0', 'Lab results ready'),
(148, 15, '2013-08-30 03:14:37', 'in-active', '05:09:35', '05:11:17', 'in-active', '05:11:17', '05:12:14', 'in-active', '00:00:00', '00:00:00', 'in-active', '05:12:14', '05:14:37', 'active', 'urgent', ''),
(149, 4, '2013-08-30 05:35:29', 'in-active', '07:30:49', '07:32:29', 'in-active', '07:32:29', '07:33:49', 'in-active', '00:00:00', '00:00:00', 'in-active', '07:33:49', '07:35:29', 'active', '', ''),
(150, 150, '2013-08-30 05:41:02', 'in-active', '07:37:37', '07:38:53', 'in-active', '07:38:53', '07:40:11', 'in-active', '00:00:00', '00:00:00', 'in-active', '07:40:11', '07:41:02', 'active', '0', ''),
(151, 2, '2013-08-30 05:41:25', 'active', '07:41:25', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(152, 3, '2013-08-30 05:41:36', 'active', '07:41:36', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(153, 151, '2013-08-30 07:19:25', 'in-active', '09:08:26', '09:11:53', 'in-active', '09:17:29', '09:19:25', 'in-active', '09:16:09', '09:17:29', 'active', '09:19:25', '00:00:00', 'active', '0', 'Lab results ready'),
(154, 3, '2013-08-31 05:34:25', 'in-active', '11:07:32', '11:09:14', 'active', '11:09:14', '11:09:54', 'active', '11:09:54', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(155, 4, '2013-09-02 18:42:48', 'in-active', '20:18:55', '20:19:38', 'in-active', '20:19:38', '20:28:17', 'in-active', '00:00:00', '00:00:00', 'in-active', '20:28:17', '20:42:48', 'active', '0', ''),
(156, 9, '2013-09-02 18:48:38', 'in-active', '20:43:13', '20:47:55', 'in-active', '20:47:55', '20:48:38', 'active', '20:48:38', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '0', ''),
(157, 105, '2013-09-05 09:02:15', 'in-active', '10:23:48', '10:24:57', 'in-active', '10:24:57', '11:02:15', 'in-active', '00:00:00', '00:00:00', 'active', '11:02:15', '00:00:00', 'active', 'urgent', ''),
(158, 6, '2013-09-09 05:56:28', 'active', '07:56:28', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(159, 12, '2013-09-09 06:11:51', 'active', '08:11:51', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(160, 2, '2013-09-11 17:01:56', 'in-active', '18:41:12', '18:57:26', 'in-active', '18:57:26', '19:01:56', 'active', '19:01:56', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', 'urgent', ''),
(161, 5, '2013-09-11 17:33:36', 'in-active', '19:10:21', '19:11:36', 'in-active', '19:30:53', '19:33:36', 'in-active', '19:15:22', '19:30:53', 'active', '19:33:36', '00:00:00', 'active', '0', 'Lab results ready'),
(162, 4, '2013-09-14 08:25:57', 'active', '10:25:57', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(163, 9, '2013-09-14 08:39:15', 'active', '10:39:15', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(164, 89, '2013-09-14 08:41:28', 'active', '10:41:28', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(165, 48, '2013-09-14 08:42:19', 'active', '10:42:19', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(166, 5, '2013-09-14 08:47:37', 'active', '10:47:37', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(167, 4, '2013-09-14 08:48:43', 'active', '10:48:43', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(168, 9, '2013-09-14 08:49:19', 'active', '10:49:19', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(169, 94, '2013-09-14 09:00:38', 'active', '11:00:38', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(170, 50, '2013-09-14 09:07:30', 'active', '11:07:30', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(171, 9, '2013-09-14 09:09:10', 'active', '11:09:10', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(172, 37, '2013-09-14 09:33:53', 'active', '11:33:53', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(173, 5, '2013-09-14 09:34:52', 'active', '11:34:52', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(174, 4, '2013-09-14 09:35:21', 'active', '11:35:21', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(175, 5, '2013-09-14 09:35:59', 'active', '11:35:59', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(176, 15, '2013-09-14 09:36:34', 'active', '11:36:34', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(177, 7, '2013-09-14 09:38:44', 'active', '11:38:44', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', ''),
(178, 9, '2013-09-14 09:43:01', 'active', '11:43:01', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'in-active', '00:00:00', '00:00:00', 'active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `walkin`
--

CREATE TABLE IF NOT EXISTS `walkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientname` varchar(500) NOT NULL,
  `department` enum('Pharmacy','Lab Tech') NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `check` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `walkin`
--

INSERT INTO `walkin` (`id`, `patientname`, `department`, `Date`, `check`) VALUES
(1, 'Jane Odhiambo', 'Lab Tech', '2013-07-30 14:01:48', '1'),
(2, 'muthoni alice mwangi', 'Lab Tech', '2013-08-12 13:25:32', '1'),
(3, 'Alice Muthoni Mwangi', 'Pharmacy', '2013-08-13 09:37:14', '1'),
(4, 'Eunice', 'Pharmacy', '2013-08-21 08:47:32', '1'),
(5, 'Daniel Njuguna', 'Lab Tech', '2013-08-22 06:19:45', '0'),
(6, 'Teresia Kariuki', 'Lab Tech', '2013-08-22 06:47:58', '1'),
(7, 'wamae', 'Pharmacy', '2013-08-30 02:54:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_lab`
--

CREATE TABLE IF NOT EXISTS `walkin_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientid` int(11) NOT NULL,
  `labtechid` int(11) NOT NULL,
  `test` varchar(255) NOT NULL,
  `results` varchar(500) NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `check` enum('1','0') NOT NULL,
  `paid` enum('No','Yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `walkin_payments`
--

CREATE TABLE IF NOT EXISTS `walkin_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientid` int(11) NOT NULL,
  `faculty` enum('Pharmacy','Lab Tech') NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `cpay` int(11) NOT NULL,
  `mpesa` varchar(255) NOT NULL,
  `paymentid` enum('1','0') NOT NULL,
  `paid` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `walkin_payments`
--

INSERT INTO `walkin_payments` (`id`, `patientid`, `faculty`, `total`, `cash`, `cpay`, `mpesa`, `paymentid`, `paid`) VALUES
(1, 4, 'Pharmacy', 80, 0, 0, '', '1', 'no'),
(2, 7, '', 90, 0, 90, 'dx456hfy', '0', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_pharm`
--

CREATE TABLE IF NOT EXISTS `walkin_pharm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administeredstatus` enum('not dispensed','dispensed') NOT NULL,
  `pharmid` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `medname` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `remarks` varchar(660) NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `paid` enum('no','yes') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `walkin_pharm`
--

INSERT INTO `walkin_pharm` (`id`, `administeredstatus`, `pharmid`, `patientid`, `medname`, `dosage`, `duration`, `amount`, `remarks`, `paymentid`, `paid`, `date`) VALUES
(1, 'not dispensed', 56, 4, 'CET002', 'one teaspoon after every 24 hours', 4, 1, 'take at night', '1', 'yes', '2013-08-21 08:48:58'),
(2, 'not dispensed', 61, 7, 'AMIN01', '4', 6, 4, 'after meals', '1', 'yes', '2013-08-30 02:55:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`patientid`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`visitid`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`empid`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `check_up`
--
ALTER TABLE `check_up`
  ADD CONSTRAINT `check_up_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `check_up_ibfk_2` FOREIGN KEY (`visitid`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD CONSTRAINT `lab_test_ibfk_3` FOREIGN KEY (`doc_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lab_test_ibfk_4` FOREIGN KEY (`visitid`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `patient_allergy`
--
ALTER TABLE `patient_allergy`
  ADD CONSTRAINT `patient_allergy_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_11` FOREIGN KEY (`checkupid`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_ibfk_12` FOREIGN KEY (`docid`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `triage`
--
ALTER TABLE `triage`
  ADD CONSTRAINT `triage_ibfk_5` FOREIGN KEY (`NurseID`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `triage_ibfk_6` FOREIGN KEY (`visitid`) REFERENCES `visit` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`patientid`) REFERENCES `patients` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
