-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 11:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
use db_eira;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eira`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `rna_type` varchar(255) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `ref_num` varchar(255) NOT NULL,
  `approval` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `proof_pay` varchar(255) NOT NULL,
  `date_pay` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `rna_type`, `pay_type`, `ref_num`, `approval`, `email`, `fname`, `lname`, `contact`, `address`, `proof_pay`, `date_pay`) VALUES
(42, 'rna1', 'Gcash', '12323453455123', 1, 'bentf24@gmail.com', 'benedict', 'asdasd', '4564356456', 'sadasdada', 'upload_proof_pay/proof-2054415.png', '2023-05-02 05:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `cert_id` varchar(255) NOT NULL,
  `rna_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_percent_rnat` decimal(11,3) NOT NULL,
  `user_percent_rap` decimal(11,3) NOT NULL,
  `user_percent_rat` decimal(11,3) NOT NULL,
  `user_percent_dai` decimal(11,3) NOT NULL,
  `overall_user_percent` decimal(11,3) NOT NULL,
  `max_percent_rnat` decimal(11,3) NOT NULL,
  `max_percent_rap` decimal(11,3) NOT NULL,
  `max_percent_rat` decimal(11,3) NOT NULL,
  `max_percent_dai` decimal(11,3) NOT NULL,
  `overall_max_percent` int(11) NOT NULL,
  `verdict` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `cert_id`, `rna_type`, `email`, `full_name`, `user_percent_rnat`, `user_percent_rap`, `user_percent_rat`, `user_percent_dai`, `overall_user_percent`, `max_percent_rnat`, `max_percent_rap`, `max_percent_rat`, `max_percent_dai`, `overall_max_percent`, `verdict`, `date`) VALUES
(41, 'NvjlGrdfxB6X', 'rna1', 'bentf24@gmail.com', 'benedict asdasd', 30.769, 46.154, 15.385, 7.692, 100.000, 30.769, 46.154, 15.385, 7.692, 100, 'passed', '2023-05-02 08:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `rna_type` varchar(255) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ques_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `rna_type`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `ques_type`, `image`) VALUES
(20, 'rna1', 'What is an Arduino?', 'Image Editor', 'Programming Language', 'Video Editing Software', 'Open-source Electronic Platform', 'Open-source Electronic Platform', 'rnat', ''),
(21, 'rna1', 'What language is an Arduino typically based on?', 'Python', 'Java', 'Java Script', ' C / C++', ' C / C++', 'rnat', ''),
(22, 'rna1', 'In Arduino Mega, how many analog pins are used?', '14', '16', '20', '8', '16', 'rnat', ''),
(23, 'rna1', ' In the Arduino IDE, Arduino Codes are referred to as what?', 'Codes', 'Drawings', 'Sketches', 'Notes ', 'Sketches', 'rnat', ''),
(24, 'rna1', 'Arduino IDE consists of what two functions?', 'Build() Loop()', 'Setup() Build()', 'Loop() Build() Setup', 'Setup() Loop()', 'Setup() Loop()', 'rap', ''),
(25, 'rna1', 'What is the proper sequence of the execution process of an Arduino Code', ' Editor -> Compiler -> Preprocessor', 'Compiler -> Editor -> Preprocessor', 'Editor -> Preprocessor -> Compiler', 'Preprocessor -> Editor -> Compiler', 'Editor -> Preprocessor -> Compiler', 'dai', ''),
(26, 'rna1', 'The Arduino Uno uses ____ microcontroller.', 'ATmega328p', 'AT91SAM3x8E', 'ATmega2560', 'ATmega32114', 'ATmega328p', 'dai', ''),
(27, 'rna1', 'What Arduino Board has an onboard joystick?', 'Arduino Nano', 'Arduino Uno', 'Arduino Due', 'Arduino Esplora', 'Arduino Esplora', 'rnat', ''),
(28, 'rna1', 'Arduino Zero is supported by ____ processor.', 'ARM Cortex M0+', 'Atmega32u0', 'ARM Cortex M3', 'Atmega2560', 'ARM Cortex M0+', 'rnat', ''),
(29, 'rna1', 'On every startup of the Arduino System, how many times does the setup() function run?', '1', '2', '3', '4', '1', 'rnat', ''),
(30, 'rna1', 'The GPIO stands for what?', 'General Purpose Inner Output Propellers', 'General Purpose Input Output Pins', 'General Process Input Output Pins', 'General Process Inner Outer Pins', 'General Purpose Input Output Pins', 'rnat', ''),
(31, 'rna1', 'This are the pre-built circuit boards fits on the top of Android.', 'Data types', 'Shields', 'Breadboard', 'Sensors', 'Shields', 'rnat', ''),
(32, 'rna1', 'IDE stands for what?', 'Internal Deep Environment', 'Integrated Deep Escape', 'Integrated Development Environment', 'In Deep Environment', 'Integrated Development Environment', 'rnat', ''),
(33, 'rna1', 'Which programming language is used for controlling of Arduino.', 'C Languages', 'Assembly Language', 'JAVA', 'Any Language', 'Any Language', 'rap', ''),
(34, 'rna1', ' Arduino recognizes variable types except ___?', 'Float', 'int', 'Long', 'All of the Above are recognize by the Arduino', 'All of the Above are recognize by the Arduino', 'rnat', ''),
(35, 'rna1', 'The default bootloader of Arduino Uno is _____.', 'AIR-boot', 'Optiboot bootloader', 'GAG', 'Bare Box', 'Optiboot bootloader', 'rnat', ''),
(36, 'rna1', 'What symbol is used to calculate the modulo in Arduino?', '$', ' #', '%', '!', '%', 'rnat', ''),
(37, 'rna1', 'In Arduino Uno, how many digital pins are there?', '14', '20', '16', '15', '14', 'dai', ''),
(38, 'rna1', 'Board that used the first microcontroller within build USB?', 'UNO', 'RedBoard', 'Leonardo', 'LilyPad', 'Leonardo', 'rnat', ''),
(39, 'rna1', '  In ATmege328p what does ‘p’ stand for? ', 'Programmable on chip', 'Power-Pico', 'Pico-Power', 'Production', 'Pico-Power', 'rnat', ''),
(40, 'rna1', 'Arduino is an open-source tool used to build blueprints for what?', 'Chemical', 'Electrical', 'Electronics', 'Computer', 'Electronics', 'rnat', ''),
(41, 'rna1', 'Arduino consists of both what?', 'Software and Hardware', 'Software and Timing Circuit', 'Software and Feedback Circuit', 'Software and Programmable Circuit', 'Software and Programmable Circuit', 'rnat', ''),
(42, 'rna1', 'What is another call for an Arduino board?', 'Microprocessor', 'Microcontroller', 'Oscillator', 'Timer', 'Microcontroller', 'rnat', ''),
(43, 'rna1', 'What is the approved voltage for Arduino types are ______.', '3 volts and 5 volts', '10 volts and 20 volts', '15 volts and 20 volts', '6 volts and 12 volts', '6 volts and 12 volts', 'dai', ''),
(44, 'rna1', 'The best product for beginners in the family of Arduino is what?', 'UNO', 'Mega', 'Nano', 'Thrive', 'UNO', 'rnat', ''),
(45, 'rna1', 'Arduino cannot be run without _____?', '05', '20', '30', '10', '20', 'dai', ''),
(46, 'rna1', ' Arduino will destroy when the voltage supply is greater than what volts?', '20', '30', '10', '15', '20', 'rat', ''),
(47, 'rna1', 'Signals from an analog sensor are ____ on analog pins.', 'Read', 'Write', 'Out', 'in', 'Read', 'rnat', ''),
(48, 'rna1', 'PWM stands for? ', 'Pulse Within Modulation', 'Pulse Width Modulation', 'Pulse Wide Modulation', 'None of the above', 'Pulse Width Modulation', 'rnat', ''),
(49, 'rna1', 'AREF stands for?', 'Analog Revalue', 'Annuity Reference', 'Analog Reference', 'Amplified Reference', 'Analog Reference', 'rnat', ''),
(50, 'rna1', 'Each analog input reaches a what limit if the voltage value is 5 volts.', 'Least', 'Minimum', 'Upper', 'Lower', 'Upper', 'rnat', ''),
(51, 'rna1', 'In order to reopen the code and load it in Arduino, the reset pin is switched to _____.', 'VCC', 'GND', '5V', '3V', 'GND', 'dai', ''),
(52, 'rna1', 'In the Arduino Board, TX pin represents ____.', 'Restart', 'Transmit', 'Ground', 'Receives', 'Transmit', 'rnat', ''),
(53, 'rna1', 'In the Arduino Board, the RX pin represents ____.', 'Restart', 'Transmit', 'Ground', 'Receives', 'Receives', 'rnat', ''),
(54, 'rna1', 'The amount of voltage that is allowed to enter the Arduino board is authorized by _____.', 'Oscillator', 'Voltage stabilizer', 'Amplifier', 'Voltage regulator', 'Voltage regulator', 'dai', ''),
(55, 'rna1', 'The model of Arduino that is more stable than any other', 'Uno', 'Red board', 'Amplified', 'None of the Above', 'Red board', 'rnat', ''),
(56, 'rna1', 'Voltages between 7 and ___ volts DC is what the red board power regulator can handle.', '05', '10', '15', '18', '15', 'rnat', ''),
(57, 'rna1', 'Which of the Arduino\'s microcontrollers has been pre-programmed by the _____.', 'Bootloader', 'Actuator', 'Amplifier', 'None of the Above', 'Bootloader', 'dai', ''),
(58, 'rna1', '____ is a level signal conversion circuit that is present on some Arduino boards.', 'Oscillator', 'Level Shifter', 'Shift Register', 'Amplifier', 'Level Shifter', 'dai', ''),
(59, 'rna1', 'What Mhz crystal oscillator that every Arduino has?', '12', '14', '16', '20', '16', 'dai', ''),
(60, 'rna1', 'Five volts ____ regulator is in every Arduino Board?', 'Horizontal', 'Vertical', 'Linear', 'Exponential', 'Linear', 'dai', ''),
(61, 'rna1', '___ is a feature that activates upon power-up or reset.', 'While', 'Setup', 'Loop', 'None of the above', 'Setup', 'dai', ''),
(62, 'rna1', 'The process that runs repeatedly in the main program?', 'While', 'Setup', 'Loop', 'None of the above', 'Loop', 'rnat', ''),
(63, 'rna1', 'What oscillator does Arduino Mega have?', 'Feedback', 'Jack', 'Timing', 'Crystal', 'Crystal', 'rnat', ''),
(64, 'rna1', 'What Atmel AVR microcontroller is present in Arduino boards? ', ' 2-bit', ' 3-bit', ' 8-bit', ' 6-bit', ' 8-bit', 'rnat', ''),
(65, 'rna1', '____ volts are supplied by the Arduino 5V pin.', '10', '0 ', '5', '2.5', '5', 'dai', ''),
(66, 'rna1', '____ volts are supplied by the Arduino 3.3V pin.', '2.5', '3.3', '5', ' 10', '3.3', 'dai', ''),
(67, 'rna1', 'Code writing and uploading into the board is done using _____?', 'IDE', 'SOME', 'PC', 'Environment', 'IDE', 'dai', ''),
(68, 'rna1', ' How many analog pins do Arduino boards have? ', '2', '4', '6', '8', '6', 'rnat', ''),
(69, 'rna1', 'In Arduino, digital pins are referred to as ___ pins.', '10', '11', '12', '13', '13', 'rnat', ''),
(70, 'rna1', 'In the image shown below has a problem in uploading the sketches to the board, choose the right solution for the problem.', 'Restart the Arduino IDE', 'Close every other software/tool including the serial monitor/plotter', 'Disconnect the USB Cable and connect again', 'Close the Arduino IDE', 'Close every other software/tool including the serial monitor/plotter', 'rat', 'ques_img/ques_img-6420482.png'),
(71, 'rna1', 'An error occurs while uploading the code to the Arduino board. What seems to be the problem shown in the figure below?', 'Loose USB cable connection', 'There is an error in the code', 'The code is larger than the flash memory', 'The Arduino bootloader failed to load', 'The code is larger than the flash memory', 'rat', 'ques_img/ques_img-3462737.png'),
(72, 'rna1', 'What is the solution for the problem shown in the figure below?', 'Reduce the amount of space occupied by the code', 'Reupload the code to the board', 'Disconnect the USB cable ', 'Upload another version of the code', 'Reduce the amount of space occupied by the code', 'rat', 'ques_img/ques_img-5159818.png'),
(73, 'rna1', 'While opening the Arduino IDE an error occurs, what seems to be the problem in the figure shown below?', 'An error occurs due to the incompatibility of JRE Library', 'An error occurs due to existing version of the IDE', 'An error occurs due to missing files of the IDE', 'None of the above', 'An error occurs due to the incompatibility of JRE Library', 'rat', 'ques_img/ques_img-2062522.png'),
(74, 'rna1', 'While opening the application an error occurs, what is the best solution to resolve the problem shown below?', 'Move the file to other Arduino board', 'Re-install the Arduino IDE', 'Close the error and open the application once again', 'Replace the JRE in the Arduino package with recent version', 'Replace the JRE in the Arduino package with recent version', 'rat', 'ques_img/ques_img-2335192.png'),
(75, 'rna1', 'What seems to be the problem in the figure shown below?', 'There is a missing syntax in the code', 'There is a misspelled syntax in the code', 'There is a semi-colon is missing in the code', 'None of the above', 'There is a semi-colon is missing in the code', 'rap', 'ques_img/ques_img-5724091.png'),
(76, 'rna1', 'Read the code carefully shown in the figure below, if the code gives an output HIGH signal at pin1 what the correction code for the highlighted part of the code?', 'x = x + 1', 'x = x - 1', 'x = x > 1', 'x = x < 1', 'x = x + 1', 'rap', 'ques_img/ques_img-5509602.png'),
(77, 'rna1', 'Read the given code below carefully. What is the output of the code if the input supplied to pin1 of the form of 10110?', '1 0 -1 0 1 0 1 0 -1 0', '1 0 0 1 1 1 0 1 0 1', '-1 0 1 0 -1 0 1 0 -1 0', '-1 0 -1 0 1 0 1 0 -1 0 ', '1 0 -1 0 1 0 1 0 -1 0', 'rap', 'ques_img/ques_img-3126654.png'),
(78, 'rna1', 'Analyze the given code below. How many times does the code gives digital HIGH signal at pin 5?', '3', '1', '2', '4', '2', 'rap', 'ques_img/ques_img-4098417.png'),
(79, 'rna1', 'How can the code inside the loop function run indefinitely but the function itself run just once?', 'Make a statement that calls recursive functions.', 'Within the loop() function, create an infinite nested loop.', 'From the loop() function, call the setup() function.', 'From the setup() function, call the loop() function.', 'Within the loop() function, create an infinite nested loop.', 'rap', ''),
(80, 'rna1', 'What three components make up a for-loop?', 'Memory allocation, increment/decrement, conditional', 'Conditional, reset, increment/decrement', 'Initialization, conditional and increment/decrement', 'Initialization, memory allocation, conditional', 'Initialization, conditional and increment/decrement', 'rap', ''),
(81, 'rna1', 'Which control structure resembles an if-else statement the most?', 'For loop', 'While Loop', 'Continue', 'Switch Case', 'Switch Case', 'rap', ''),
(82, 'rna1', 'If a constant 5V signal is used as the input to the code, how many times will the following loop run?', 'Just once', 'Twice ', 'Four times', 'Infinitely ', 'Infinitely ', 'rap', 'ques_img/ques_img-1922152.png'),
(83, 'rna1', 'What will happen if pin 7 receives a constant 5V supply from the code below? What is the output it will give?', '0123', '1029', '1024', '1023', '1023', 'rap', 'ques_img/ques_img-3305800.png'),
(84, 'rna1', 'What objective does the given source code serve?', 'Delete', 'Search', 'Sort', 'Append', 'Search', 'rap', 'ques_img/ques_img-5262154.png'),
(85, 'rna1', 'Can a memory leak from an infinite loop put embedded systems in danger?', 'Yes, it can put the embedded system in danger', 'No, it will not put the embedded system in danger', 'Yes, but only if it used in specific scope', 'No, but only in some Arduino boards', 'Yes, it can put the embedded system in danger', 'rap', ''),
(86, 'rna1', 'What will be the output of the given following code?', '1 2 3', '1 3 2', '3 2 1', '2 3 1', '1 2 3', 'rap', 'ques_img/ques_img-1689255.png'),
(87, 'rna1', 'Do iteration and recursion differ from one another?', 'Yes, there is a difference between the two', 'No, they are the same', 'Yes, but only in some other programming language', 'Yes, depending on the version of the programming language', 'Yes, there is a difference between the two', 'rat', ''),
(88, 'rna1', 'What are the three important parts of Arduino?', 'Code, values and function', 'Structure, values and function', 'Function, structure and values', 'Values, structure and function’', 'Structure, values and function', 'rat', ''),
(89, 'rna1', 'Which of the following is the correct function to find the length of string?', 'Strleng()', 'Strnglen()', 'Strlen()', 'Stringlen()', 'Strlen()', 'rap', ''),
(90, 'rna1', 'Which of the following is used to convert string to upper case letter?', 'my_str.toUpperCase()', 'my_string.UpperCase()', 'my_str.upperCase()', 'my_str.Uppercase()', 'my_str.toUpperCase()', 'rap', ''),
(91, 'rna1', 'Which of the following functions of time in Arduino?', 'delay()', 'millis()', 'delayMicroseconds()', 'all of the above', 'all of the above', 'rap', ''),
(92, 'rna1', 'What is the most stable version of Arduino software?', 'Version 1.8.2', 'Version 1.7.3', 'Version 1.7.2', 'Version 1.8.3', 'Version 1.8.3', 'rap', ''),
(93, 'rna1', 'Which of the following is the advantage of Arduino?', 'It able to read analog or digital input signals', 'The programmers are able to control some functions', 'Its only uses c and c++ programming language', 'None of the above', 'It able to read analog or digital input signals', 'rnat', ''),
(94, 'rna1', 'What is a sketch in Arduino?', 'It is the initial draft drawing', 'It is a tool in the Arduino IDE', 'It is the terminology used to call a program', 'All of the above', 'It is the terminology used to call a program', 'rnat', ''),
(95, 'rna1', 'In Arduino, what is the use of operator?', 'It is use to compile the code', 'It is use to compile mathematical or logical function', 'It is use to separate the syntax', 'None of the above', 'It is use to compile mathematical or logical function', 'rnat', ''),
(96, 'rna1', 'An error occurs during compiling stage, what seems to be the problem shown in the image below?', 'There is an error in the code', 'There are missing libraries that needs to install', 'There is compatibility issue with the Arduino IDE version', 'The code failed to upload to the Arduino Board', 'There are missing libraries that needs to install', 'rat', 'ques_img/ques_img-2639550.png'),
(97, 'rna1', 'The most common issue makers that will encounter when using an Arduino Board is that the board is not recognized by the computer or IDE. The two usual causes of this are the ___ and ____.', 'Code and the USB Cable', 'IDE and the Code', 'USB cable and Board Drivers', 'Board Drivers and Code', 'USB cable and Board Drivers', 'dai', ''),
(98, 'rna1', 'In for loop function, identify what is the missing syntax shown in the figure below.', 'Stop condition, Iterator initialization, Increment instruction ', 'Startcondition, Iterator initialization, Increment instruction ', 'Stop condition, Iterator initialization, decrement instruction ', 'Do condition, Iterator initialization, Increment instruction ', 'Stop condition, Iterator initialization, Increment instruction ', 'rap', 'ques_img/ques_img-7244015.png'),
(99, 'rna1', 'What does the curly braces use in Arduino programming?', 'It is used to specify the start and finish of functions and specific statements', 'It is used to indicate when a statement has ended.', 'It is use to indicate any written after the line is not included in the program', 'None of the above', 'It is used to specify the start and finish of functions and specific statements', 'rap', ''),
(100, 'rna1', 'What does the semicolon use in Arduino Programming?', 'It is used to specify the start and finish of functions and specific statements', 'It is used to indicate when a statement has ended.', 'It is use to indicate any written after the line is not included in the program', 'All of the above', 'It is used to indicate when a statement has ended.', 'rap', ''),
(101, 'rna1', 'Which of the following line is used to comment in Arduino Programming?', '//', '||', '\\\\', '--', '//', 'rap', ''),
(102, 'rna1', 'What type of comment that can extend over more than one line.', 'Line comment', 'Block comment', 'Comment', 'None of the above', 'Block comment', 'rap', ''),
(103, 'rna1', 'What does /* */ symbol is for?', 'To comment one line of the program', 'To comment multi-line of the program', 'To highlight the code', 'None of the above.', 'To comment multi-line of the program', 'rap', ''),
(104, 'rna1', 'Which of the following is the correct syntax is used for reading the value in the pins.', 'digitaLRead()', 'digitalread()', 'DigitalRead()', 'digitalRead()', 'digitalRead()', 'rap', ''),
(105, 'rna1', 'What does the syntax Serial.println() for?', 'This command prints the value within the brackets on the serial monitor with a line break.', 'This command prints the value within the brackets on the serial monitor without a line break.', 'This command prints the value on the serial monitor continuously', 'This command prints and read value on the serial monitor once. ', 'This command prints the value within the brackets on the serial monitor with a line break.', 'rap', ''),
(106, 'rna1', 'Which of the following logical operators is recognized by the Arduino IDE?', '&&', '||', '!', 'all of the above', 'all of the above', 'rap', ''),
(107, 'rna1', 'Read the following code carefully, which of the following is used to manipulate the time', 'void loop', 'digitalWrite', 'delay', 'pinMode', 'delay', 'rap', 'ques_img/ques_img-8791272.png'),
(108, 'rna1', 'Which of the following is the best description for the function that serial receive buffer can be filtered out using this function to see if there is any data that can be read from it. A number value representing the remaining bytes will be returned by the function.', 'Serial.read()', 'Serial.print()', 'Serial.available()', 'Serial.begin()', 'Serial.available()', 'rap', ''),
(109, 'rna1', 'Which of the following function is also known as the serial spy?', 'Serial.begin()', 'Serial.available()', 'Serial.captCrunch()', 'Serial.parseFloat()', 'Serial.available()', 'rap', ''),
(110, 'rna1', '______ returns a byte after reading one character.', 'Serial.parseInt()', 'Serial.parseFloat()', 'Serial.available()', 'Serial.read()', 'Serial.read()', 'rap', ''),
(111, 'rna1', '______ returns an integer number after reading multiple characters', 'Serial.parseInt()', 'Serial.parseFloat()', 'Serial.available()', 'Serial.read()', 'Serial.parseInt()', 'rap', ''),
(112, 'rna1', 'How many libraries registered in the Arduino library manager?', 'On', 'Off', 'Blink', 'Dim', 'On', 'rap', 'ques_img/ques_img-2018743.png'),
(113, 'rna1', 'How many seconds does the code run?', '50 milliseconds', '50 seconds', '5 seconds', '500 seconds', '5 seconds', 'rap', 'ques_img/ques_img-7270715.png'),
(114, 'rna1', 'Which means on?', 'LOW', 'HIGH', 'OUTPUT', 'Delay', 'HIGH', 'rap', ''),
(115, 'rna1', 'Which means off?', 'HIGH ', 'LOW', 'Delay', 'OUTPUT', 'LOW', 'rap', 'ques_img/ques_img-4826117.png'),
(116, 'rna1', 'There are 2 ways to reset the Arduino Board, one is to press the reset button and the other one is to _________?', 'Open the serial monitor', 'Bring the RESET pin to LOW', 'Bring the RESET pin to HIGH', 'None of the above', 'Bring the RESET pin to LOW', 'rat', ''),
(117, 'rna1', 'Which of the statements below is not the function of #include?', 'Used to integrate external libraries into your sketch', 'Provides the programmer with the access to many standard C libraries', '#include is similar to #define, has semicolon terminator, and the compiler will yield cryptic error messages if added', 'All of the above', '#include is similar to #define, has semicolon terminator, and the compiler will yield cryptic error messages if added', 'rat', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company_univ` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `activation` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fname`, `lname`, `contact`, `image`, `password`, `company_univ`, `address`, `activation`, `pin`, `date_reg`) VALUES
(40, 'bentf24@gmail.com', 'benedict', 'asdasd', 4564356456, '', '$2y$10$QwFLZ4cRlOPqdC.FkzAlIuktC0NbuU8cx2yQ73KJnfpBkW4bd9LDC', 'sadasdasd', 'sadasdada', 1, 43879, '2023-04-27 01:57:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
