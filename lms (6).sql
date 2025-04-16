-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 06:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Language', 'language', NULL, '2025-03-03 20:58:28'),
(3, 'Grammar', 'grammar', NULL, NULL),
(4, 'Vocabulary', 'vocabulary', NULL, NULL),
(5, 'Pronunciation', 'pronunciation', NULL, '2025-03-04 06:46:17'),
(6, 'Bilingual', 'bilingual', NULL, NULL),
(7, 'Happy', 'happy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogcat_id` int(11) NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_descp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `blogcat_id`, `post_title`, `post_slug`, `post_image`, `long_descp`, `post_tags`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Power of Language: How Learning a New Language Transforms Your Mind', 'the-power-of-language:-how-learning-a-new-language-transforms-your-mind', 'upload/post/1825670946412908.jpg', '<p data-pm-slice=\"1 1 []\">Language is more than just a means of communication; it is a powerful tool that shapes the way we think, perceive the world, and connect with others. Learning a new language is not only a valuable skill but also a transformative experience that brings numerous cognitive, social, and professional benefits.</p>\r\n<h3>Cognitive Benefits</h3>\r\n<p>One of the most significant advantages of learning a new language is its impact on cognitive abilities. Studies have shown that bilingual or multilingual individuals tend to have better memory, problem-solving skills, and multitasking abilities. Learning a language stimulates the brain, keeping it active and engaged, which can even delay cognitive decline as people age.</p>\r\n<p>Moreover, language learning improves concentration and enhances creativity. Since each language has its unique structure and vocabulary, learners develop a more flexible way of thinking, allowing them to approach problems from different perspectives.</p>\r\n<h3>Social and Cultural Connections</h3>\r\n<p>Language is a gateway to understanding different cultures. By learning a new language, individuals gain insight into the traditions, values, and ways of life of people from different backgrounds. This fosters empathy, open-mindedness, and a deeper appreciation for diversity.</p>\r\n<p>In addition, speaking multiple languages enhances social interactions. It allows people to build relationships with individuals from different linguistic backgrounds, making travel experiences more enriching and professional networking more effective.</p>\r\n<h3>Career Advantages</h3>\r\n<p>In today&rsquo;s globalized world, being multilingual is a significant advantage in the job market. Many employers value language skills as they indicate adaptability, cultural awareness, and strong communication abilities. Industries such as international business, tourism, education, and diplomacy often seek individuals who can communicate in multiple languages.</p>\r\n<p>Furthermore, learning a new language can open up opportunities to work or study abroad. It increases access to a wider range of academic and professional resources, ultimately enhancing career prospects and personal growth.</p>\r\n<h3>Strategies for Effective Language Learning</h3>\r\n<p>Learning a language requires dedication and practice. Here are some effective strategies to improve language proficiency:</p>\r\n<p><strong>Immerse Yourself:</strong> Surround yourself with the language through movies, music, and conversations with native speakers.</p>\r\n<p><strong>Practice Regularly:</strong> Consistency is key. Set a study schedule and practice speaking, writing, and reading daily.</p>\r\n<p><strong>Use Technology:</strong> Language-learning apps, online courses, and flashcards can make learning engaging and interactive.</p>\r\n<p><strong>Join Language Groups:</strong> Engage in language exchange programs or join clubs where you can practice with others.</p>\r\n<p><strong>Think in the Language:</strong> Try to think and express yourself in the target language to build fluency.</p>\r\n<h3>Conclusion</h3>\r\n<p>Learning a new language is a rewarding journey that enhances cognitive functions, deepens cultural understanding, and opens doors to new opportunities. Whether for personal growth, social interactions, or career advancement, mastering another language enriches life in countless ways. So why not take the first step today and embark on the adventure of language learning?</p>\r\n<p>&nbsp;</p>', 'jQuery,language', '2025-03-05 03:12:18', '2025-03-05 03:12:18'),
(2, 3, 'The History of Grammar: The Evolution of Language Rules', 'the-history-of-grammar:-the-evolution-of-language-rules', 'upload/post/1825671349840181.png', '<p data-pm-slice=\"1 1 []\">Grammar, the set of rules that govern language structure, has played a crucial role in human communication for centuries. Its development spans across civilizations, adapting to linguistic changes and scholarly advancements.</p>\r\n<h3><strong>Ancient Beginnings</strong></h3>\r\n<p>The earliest recorded grammatical studies date back to ancient Mesopotamia, where Sumerians created written symbols for their language around 2500 BCE. However, the first known systematic grammar was developed in ancient India by Panini, a Sanskrit scholar from the 4th century BCE. His work, <em>Ashtadhyayi</em>, remains one of the most sophisticated linguistic analyses ever created.</p>\r\n<h3>Greek and Roman Contributions</h3>\r\n<p>The Greeks made significant contributions to grammar, particularly through philosophers like Plato and Aristotle, who studied language structure and meaning. The Stoic philosophers later formalized grammatical rules, classifying words into different categories. The Romans, influenced by Greek linguistics, refined grammatical studies, with figures like Varro and Priscian shaping Latin grammar, which influenced many modern languages.</p>\r\n<h3>Medieval and Renaissance Developments</h3>\r\n<p>During the Middle Ages, Latin remained the dominant language for education and scholarship. Monks and scholars preserved and expanded grammatical knowledge. The Renaissance brought renewed interest in classical texts, leading to the study of vernacular languages and the standardization of grammar rules for languages like English, French, and Spanish.</p>\r\n<h3>Modern Grammar</h3>\r\n<p>In the 18th and 19th centuries, linguistic scholars sought to define and codify grammatical rules for different languages. The emergence of comparative linguistics helped uncover relationships between languages, while the 20th century saw the rise of structural and generative grammar theories, particularly through the work of Noam Chomsky. Today, grammar continues to evolve with digital communication and global linguistic influences.</p>\r\n<h3>Conclusion</h3>\r\n<p>The history of grammar reflects humanity&rsquo;s ongoing effort to structure and refine language. From ancient scripts to modern linguistic theories, grammar remains a fundamental part of communication, adapting to the needs of each generation.</p>\r\n<p>&nbsp;</p>', 'jQuery,grammar', '2025-03-05 01:53:51', '2025-03-05 01:53:51'),
(4, 4, 'Mastering Pronunciation: Speak Clearly and Confidently', 'mastering-pronunciation:-speak-clearly-and-confidently', 'upload/post/1825762865255968.jpg', '<p>aaaa</p>', 'aaa', '2025-03-12 22:43:24', '2025-03-12 22:43:24'),
(5, 1, 'How Language Shapes Cultural Identity and Traditions', 'how-language-shapes-cultural-identity-and-traditions', 'upload/post/1827462409820313.jpg', '<p data-pm-slice=\"1 1 []\">Language is more than just a tool for communication; it is the heartbeat of culture and identity. The way we speak, the words we use, and the expressions we adopt are deeply tied to our history, values, and traditions. Every language carries the unique worldview of the people who speak it, shaping not only how they interact with the world but also how they preserve and pass on their cultural heritage.</p>\r\n<h3><strong>Language as a Reflection of Culture</strong></h3>\r\n<p>Each language is a mirror of the society it originates from. The words, idioms, and phrases used in a language reflect the values, beliefs, and way of life of its speakers. For instance, in Japanese, there are different levels of politeness embedded in the language, reflecting the cultural importance of respect and hierarchy. Similarly, many Indigenous languages have words that describe a deep relationship with nature, emphasizing their connection to the land.</p>\r\n<h3><strong>Preserving Traditions Through Language</strong></h3>\r\n<p>Language plays a crucial role in maintaining traditions and customs. Stories, folklore, songs, and rituals are passed down through generations via spoken or written language. When a language disappears, it often takes with it a wealth of traditional knowledge. This is why efforts to preserve endangered languages are vital in keeping cultural traditions alive.</p>\r\n<h3><strong>Language and Identity</strong></h3>\r\n<p>For many people, their language is a core part of their identity. It provides a sense of belonging and connects individuals to their roots. Bilingual and multilingual individuals often experience a unique connection to multiple cultures, allowing them to navigate different cultural spaces with ease. However, language loss due to globalization and colonization has led some communities to struggle with maintaining their cultural identity.</p>\r\n<h3><strong>How Language Influences Thought</strong></h3>\r\n<p>The structure of a language can shape the way its speakers think. This concept, known as linguistic relativity, suggests that the way people perceive the world is influenced by the language they speak. For example, some languages have multiple words for colors or emotions, which can lead to a more nuanced understanding of those concepts. Similarly, cultures with languages that emphasize collectivism may prioritize community and relationships over individualism.</p>\r\n<h3><strong>The Role of Language in Modern Society</strong></h3>\r\n<p>In today&rsquo;s globalized world, languages are constantly evolving and blending. While this allows for greater communication and cultural exchange, it also poses challenges in preserving linguistic diversity. Many communities are working hard to revitalize their native languages through education, digital media, and cultural programs to ensure that their heritage continues to thrive.</p>\r\n<h3><strong>Conclusion</strong></h3>\r\n<p>Language is more than a means of communication; it is a vessel for cultural identity, history, and traditions. It shapes how people see the world, interact with one another, and pass down their heritage. As we navigate an increasingly interconnected world, it is essential to recognize and appreciate the power of language in preserving cultural diversity and fostering understanding among different communities.</p>', 'language', '2025-03-24 01:12:45', NULL),
(6, 6, 'The Benefits of Being Bilingual: How It Boosts Your Brainpower', 'the-benefits-of-being-bilingual:-how-it-boosts-your-brainpower', 'upload/post/1827463481030220.jpg', '<p data-pm-slice=\"1 1 []\">In a world that is increasingly interconnected, the ability to speak more than one language is a valuable skill. Beyond just enhancing communication, being bilingual provides numerous cognitive, social, and even economic benefits. Research has shown that bilingualism strengthens the brain in various ways, leading to improved mental agility, problem-solving skills, and even long-term brain health.</p>\r\n<h3><strong>1. Enhanced Cognitive Function</strong></h3>\r\n<p>Bilingual individuals tend to have better cognitive flexibility, meaning they can switch between tasks more efficiently than monolinguals. This ability to shift between languages strengthens the brain\'s executive functions, which are responsible for managing attention, planning, and problem-solving.</p>\r\n<h3><strong>2. Improved Memory and Learning Skills</strong></h3>\r\n<p>Learning and using two languages require constant mental exercise, which helps improve memory retention. Bilingual individuals often perform better in tasks that involve memorization and recall, making it easier for them to learn additional languages or absorb new information quickly.</p>\r\n<h3><strong>3. Stronger Problem-Solving and Critical Thinking Skills</strong></h3>\r\n<p>Since bilinguals are accustomed to thinking in different linguistic structures, they develop strong analytical skills. This helps them approach problems from multiple perspectives, making them better at creative thinking, decision-making, and logical reasoning.</p>\r\n<h3><strong>4. Delayed Onset of Cognitive Decline</strong></h3>\r\n<p>One of the most significant benefits of being bilingual is its impact on brain health as people age. Studies suggest that bilingual individuals are more resistant to dementia and Alzheimer\'s disease. The mental workout required to manage two languages helps keep the brain active and resilient.</p>\r\n<h3><strong>5. Increased Multitasking Abilities</strong></h3>\r\n<p>Bilingual individuals constantly switch between two languages, a skill that translates into better multitasking abilities. They can quickly adapt to different situations, juggle multiple tasks effectively, and focus better in distracting environments.</p>\r\n<h3><strong>6. Greater Cultural Awareness and Adaptability</strong></h3>\r\n<p>Language and culture are deeply connected. Bilingual individuals often have a more profound understanding of different cultures, making them more empathetic and open-minded. This cultural awareness enhances their ability to communicate and connect with people from diverse backgrounds.</p>\r\n<h3><strong>7. Career Advantages and Economic Benefits</strong></h3>\r\n<p>In an increasingly globalized job market, bilingualism is a highly sought-after skill. Many companies prefer employees who can communicate with international clients or work in multilingual environments. Being bilingual can lead to better job opportunities, higher salaries, and career advancement.</p>\r\n<h3><strong>Conclusion</strong></h3>\r\n<p>Being bilingual is more than just speaking two languages; it&rsquo;s a brain-boosting ability that enhances memory, cognitive function, and adaptability. From improving problem-solving skills to delaying cognitive decline, the benefits of bilingualism extend beyond language proficiency. As the world becomes more interconnected, learning a second language is an investment that pays off in both personal and professional growth.</p>', 'bilingual,languages', '2025-03-24 01:30:03', '2025-03-24 01:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'English', 'english', 'upload/category/1826448196309688.png', NULL, '2025-03-12 20:32:19'),
(3, 'Spanish', 'spanish', 'upload/category/1826448289100412.png', NULL, '2025-03-12 20:33:43'),
(4, 'Mandarin', 'mandarin', 'upload/category/1826448315481593.png', NULL, '2025-03-12 20:34:08'),
(5, 'French', 'french', 'upload/category/1826448342843813.png', NULL, '2025-03-12 20:34:35'),
(6, 'Korean', 'korean', 'upload/category/1826448368551030.png', NULL, '2025-03-12 20:35:00'),
(7, 'Japanese', 'japanese', 'upload/category/1826448390452066.png', NULL, '2025-03-12 20:35:20'),
(11, 'German', 'german', 'upload/category/1826815900010092.png', NULL, NULL),
(12, 'Indonesia', 'indonesia', 'upload/category/1829372818563656.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'user_id',
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'instructor_id',
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `msg`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Hello', '2025-03-10 06:33:49', '2025-03-10 06:33:49'),
(2, 3, 2, 'I need your help', '2025-03-11 07:01:56', '2025-03-11 07:01:56'),
(3, 2, 3, 'What can I help you?', '2025-03-11 20:45:28', '2025-03-11 20:45:28'),
(4, 3, 2, 'I want you to fix my error', '2025-03-11 20:47:29', '2025-03-11 20:47:29'),
(5, 2, 3, 'what kind of error do you have?', '2025-03-11 20:52:05', '2025-03-11 20:52:05'),
(6, 3, 2, 'Hmm I don\'t know', '2025-03-11 20:52:47', '2025-03-11 20:52:47'),
(7, 4, 2, 'Hello, I\'m Onis', '2025-04-14 08:19:21', '2025-04-14 08:19:21'),
(8, 2, 4, 'Hello Onis, what can i help you?', '2025-04-14 08:19:49', '2025-04-14 08:19:49'),
(9, 4, 2, 'I had some bugs in my website', '2025-04-14 08:20:26', '2025-04-14 08:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogpost_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blogpost_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 3, 'I know this is a really great blog to read', '0', '2025-03-29 07:29:16', '2025-04-14 17:33:24'),
(6, 2, 4, 'Hello, i\'m from spanish', '1', '2025-03-29 07:31:07', '2025-04-14 17:31:36'),
(7, 1, 4, 'This is so wonderful', '1', '2025-03-31 00:28:10', '2025-04-13 00:19:24'),
(8, 5, 4, 'Wow, this is amazing', '1', '2025-04-14 02:49:54', '2025-04-15 00:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `instructor_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `instructor_id`, `course_id`, `created_at`, `updated_at`) VALUES
(2, 'AZLIA', '20', '2025-02-14', 1, NULL, NULL, '2025-02-13 20:31:27', '2025-02-13 20:31:27'),
(3, 'ADMIN', '10', '2025-02-15', 1, NULL, NULL, '2025-02-12 23:21:56', NULL),
(4, 'AFIFAH', '30', '2025-02-16', 1, NULL, NULL, '2025-02-16 06:35:01', NULL),
(5, 'DISKON', '20', '2025-03-31', 1, NULL, NULL, '2025-02-16 19:30:23', NULL),
(9, 'UJIKOM', '20', '2025-05-10', 1, 2, 21, '2025-04-14 08:28:23', NULL),
(10, 'BISMILLAH', '30', '2025-04-30', 1, NULL, NULL, '2025-04-14 17:36:25', '2025-04-14 17:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_name_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resources` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `prerequisite` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bestseller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highestrated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `instructor_id`, `course_image`, `course_title`, `course_name`, `course_name_slug`, `description`, `video`, `label`, `duration`, `resources`, `certificate`, `selling_price`, `discount_price`, `prerequisite`, `bestseller`, `featured`, `highestrated`, `status`, `created_at`, `updated_at`) VALUES
(14, 1, 2, 'upload/course/thambnail/1826450495033538.jpg', 'Grammar Made Simple: Master English Tenses Easily', 'Grammar Made Simple: Master English Tenses Easily', 'grammar-made-simple:-master-english-tenses-easily', '<p>hello</p>', 'upload/course/video/1741838931.mp4', 'Beginner', '20', '3', 'Yes', 300, NULL, 'hello', '1', NULL, NULL, 1, '2025-03-12 21:08:51', '2025-03-12 22:20:31'),
(15, 3, 2, 'upload/course/thambnail/1826451542117136.png', 'Spanish in Action: Essential Phrases & Vocabulary for Daily Life', 'Spanish in Action: Essential Phrases & Vocabulary for Daily Life', 'spanish-in-action:-essential-phrases-&-vocabulary-for-daily-life', '<p>Hello</p>', 'upload/course/video/1741839926.mp4', 'Middle', '20', '2', 'Yes', 400, 200, 'Hello', '1', NULL, '1', 1, '2025-03-12 21:25:26', NULL),
(16, 4, 2, 'upload/course/thambnail/1826451968103155.jpg', 'Mandarin Tones & Characters: A Beginner’s Guide', 'Mandarin Tones & Characters: A Beginner’s Guide', 'mandarin-tones-&-characters:-a-beginner’s-guide', '<p>hello</p>', 'upload/course/video/1741840332.mp4', 'Middle', '20', '2', 'Yes', 450, 210, 'Hello', '1', NULL, '1', 1, '2025-03-12 21:32:12', NULL),
(17, 6, 2, 'upload/course/thambnail/1826453865915948.jpg', 'Hangul 101: Learn to Read & Write Korean in a Week', 'Hangul 101: Learn to Read & Write Korean in a Week', 'hangul-101:-learn-to-read-&-write-korean-in-a-week', '<p>hi</p>', 'upload/course/video/1741842142.mp4', 'Advance', '12', '1', 'Yes', 500, 400, 'hi', NULL, NULL, '1', 1, '2025-03-12 22:02:22', NULL),
(18, 5, 2, 'upload/course/thambnail/1826454350080884.jpg', 'French Pronunciation Bootcamp: Sound Like a Native!', 'French Pronunciation Bootcamp: Sound Like a Native!', 'french-pronunciation-bootcamp:-sound-like-a-native!', '<p>hello</p>', 'upload/course/video/1741842603.mp4', 'Middle', '12', '4', 'Yes', 200, 100, 'hello', '1', NULL, NULL, 1, '2025-03-12 22:10:03', NULL),
(19, 7, 2, 'upload/course/thambnail/1826454584828241.jpg', 'Hiragana & Katakana Mastery: Your First Step to Japanese', 'Hiragana & Katakana Mastery: Your First Step to Japanese', 'hiragana-&-katakana-mastery:-your-first-step-to-japanese', '<p>hai</p>', 'upload/course/video/1741842827.mp4', 'Middle', '38', '4', 'No', 400, 300, 'hai', '1', NULL, '1', 1, '2025-03-12 22:13:47', NULL),
(21, 1, 2, 'upload/course/thambnail/1826901462580135.jpg', 'TOEFL Mastery: Crush the Exam with Confidence', 'TOEFL Mastery: Crush the Exam with Confidence', 'toefl-mastery:-crush-the-exam-with-confidence', '<p>qqqq</p>', 'upload/course/video/1742269004.mp4', 'Advance', '12', '3', 'Yes', 500, NULL, 'qqqq', '1', NULL, NULL, 1, '2025-03-17 20:36:44', NULL),
(22, 1, 2, 'upload/course/thambnail/1826901533205258.jpg', 'Business English: Communicate Like a Pro', 'Business English: Communicate Like a Pro', 'business-english:-communicate-like-a-pro', '<p>123</p>', 'upload/course/video/1742269070.mp4', 'Middle', '12', '3', 'Yes', 500, NULL, '123', '1', NULL, '1', 1, '2025-03-17 20:37:50', '2025-04-14 03:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `course_goals`
--

CREATE TABLE `course_goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `goal_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_goals`
--

INSERT INTO `course_goals` (`id`, `course_id`, `goal_name`, `created_at`, `updated_at`) VALUES
(4, 5, 'abcd', '2025-01-06 04:07:01', '2025-01-06 04:07:01'),
(5, 5, 'abcd', '2025-01-06 04:07:01', '2025-01-06 04:07:01'),
(6, 5, 'abcd', '2025-01-06 04:07:01', '2025-01-06 04:07:01'),
(7, 6, 'aaaaa', '2025-01-06 06:36:21', '2025-01-06 06:36:21'),
(8, 6, 'ssss', '2025-01-06 06:36:21', '2025-01-06 06:36:21'),
(9, 6, 'ffff', '2025-01-06 06:36:21', '2025-01-06 06:36:21'),
(10, 7, 'aiaiaiai', '2025-01-06 18:30:59', '2025-01-06 18:30:59'),
(11, 7, 'aiaiaiai', '2025-01-06 18:30:59', '2025-01-06 18:30:59'),
(12, 7, 'aiaiaiai', '2025-01-06 18:30:59', '2025-01-06 18:30:59'),
(13, 8, 'aaaaa', '2025-01-13 20:51:57', '2025-01-13 20:51:57'),
(14, 8, 'aaaaa', '2025-01-13 20:51:57', '2025-01-13 20:51:57'),
(15, 9, 'bbbbb', '2025-01-13 21:02:55', '2025-01-13 21:02:55'),
(16, 9, 'bbbb', '2025-01-13 21:02:55', '2025-01-13 21:02:55'),
(24, 11, 'Learn the core Java skills needed to apply for Java developer positions in just 14 hours.', '2025-01-14 19:38:23', '2025-01-14 19:38:23'),
(25, 11, 'Learn the core Java skills needed to apply for Java developer positions in just 14 hours.', '2025-01-14 19:38:23', '2025-01-14 19:38:23'),
(26, 11, 'Be able to sit for and pass the Oracle Java Certificate exam if you choose.', '2025-01-14 19:38:23', '2025-01-14 19:38:23'),
(27, 12, 'aa', '2025-01-14 19:57:52', '2025-01-14 19:57:52'),
(28, 13, 'hai', '2025-01-14 20:01:07', '2025-01-14 20:01:07'),
(29, 14, 'aaaa', '2025-03-12 21:08:51', '2025-03-12 21:08:51'),
(30, 15, 'aaaa', '2025-03-12 21:25:26', '2025-03-12 21:25:26'),
(31, 16, 'aaaa', '2025-03-12 21:32:12', '2025-03-12 21:32:12'),
(32, 17, 'aiaiaiai', '2025-03-12 22:02:22', '2025-03-12 22:02:22'),
(33, 18, 'abcd', '2025-03-12 22:10:03', '2025-03-12 22:10:03'),
(34, 19, 'abdch', '2025-03-12 22:13:47', '2025-03-12 22:13:47'),
(36, 21, 'qqqq', '2025-03-17 20:36:44', '2025-03-17 20:36:44'),
(37, 22, 'dnjshudehu', '2025-03-17 20:37:50', '2025-03-17 20:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `course_lectures`
--

CREATE TABLE `course_lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `lecture_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_lectures`
--

INSERT INTO `course_lectures` (`id`, `course_id`, `section_id`, `lecture_title`, `video`, `url`, `content`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Simple Present Tense', NULL, NULL, 'Welcome to Motion Graphics in After Effects.\r\nIn the next lectures you will start creating your first animation and animate imported footage.\r\nBut I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes,\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.\r\nOccaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.\r\nEt harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus,\r\nOn the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.', '2025-01-18 03:33:34', '2025-02-18 21:16:28'),
(2, 5, 1, 'Simple Past Tense', NULL, 'https://youtu.be/PdbBP0F8GK8?si=FU1o1gA1EoLo4ZGd', 'Simple Past Tense', '2025-01-18 03:41:17', '2025-01-18 03:41:17'),
(3, 5, 1, 'Simple Future Tense', NULL, 'https://www.youtube.com/embed/4Ae7O57Itu8?si=Bi2Pk19U4J1-asB6', 'Simple Future Tense', '2025-01-18 03:42:53', '2025-02-18 21:35:01'),
(7, 5, 4, 'Understanding', NULL, 'https://www.youtube.com/embed/WioL50vGE04?si=I2iBOqWKhNjnI9QG', 'Understanding', '2025-01-22 06:25:53', '2025-01-22 06:25:53'),
(8, 14, 8, 'Learn English Tenses (complete course)', NULL, 'https://www.youtube.com/embed/Ljjiw9mC_Cg?si=DVDltMn_nI7gis4Z', 'Learn English Tenses (complete course)', '2025-03-16 20:43:50', '2025-04-14 07:56:10'),
(9, 14, 8, 'How to learn ALL 12 tenses', NULL, 'https://www.youtube.com/embed/d0wV9EC3t14?si=iZGwkhQfyW6MNf6s', 'How to learn ALL 12 tenses', '2025-03-16 20:44:27', '2025-04-14 07:59:23'),
(10, 14, 9, 'PRESENT SIMPLE', NULL, 'https://www.youtube.com/embed/uEj9fX5_5AI?si=uhm3kMTd-hNrfxZf', 'PRESENT SIMPLE', '2025-03-16 20:45:08', '2025-04-14 08:01:14'),
(11, 14, 9, 'PRESENT CONTINUOUS (PRESENT PROGRESSIVE)', NULL, 'https://www.youtube.com/embed/7O-Ye9HF2DI?si=Q3NUHp0A_w5V5CFy', 'PRESENT CONTINUOUS (PRESENT PROGRESSIVE)', '2025-03-16 20:45:38', '2025-04-14 08:02:31'),
(12, 14, 9, 'Present Simple or Present Continuous?', NULL, 'https://www.youtube.com/embed/GV9IFkjsQkE?si=VH7oN642gRoNqFpQ', 'Present Simple or Present Continuous?', '2025-03-16 20:47:34', '2025-04-14 08:03:21'),
(13, 14, 10, 'PAST SIMPLE', NULL, 'https://www.youtube.com/embed/LkyCYeDdvgI?si=InVcI_fP0JjmSCVS', 'PAST SIMPLE', '2025-03-16 20:48:17', '2025-04-14 08:04:32'),
(14, 14, 10, 'PAST CONTINUOUS', NULL, 'https://www.youtube.com/embed/zBDdCy4_3O4?si=7IHx3gefmfFHRqhq', 'PAST CONTINUOUS', '2025-03-16 20:48:52', '2025-04-14 08:05:21'),
(15, 23, 11, 'Introduction', NULL, 'https://www.youtube.com/embed/fYZP95y2mgM?si=c5FReWDVXC4Za1jF', 'Introduction', '2025-04-14 16:46:00', '2025-04-14 16:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

CREATE TABLE `course_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`id`, `course_id`, `section_title`, `created_at`, `updated_at`) VALUES
(1, 5, 'Section 1 : Grammar', NULL, NULL),
(2, 11, 'test', NULL, NULL),
(4, 5, 'Section 2 : Speaking', NULL, NULL),
(8, 14, 'Introduction to English Tenses', NULL, NULL),
(9, 14, 'Present Tenses: Talking About Now', NULL, NULL),
(10, 14, 'Past Tenses: Talking About the Past', NULL, NULL),
(11, 23, 'Section 1 : Introduction', NULL, NULL),
(12, 23, 'Section 2 : Grammar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_profiles`
--

CREATE TABLE `instructor_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_of_study` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_taught` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `years_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curriculum_vitae` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_profiles`
--

INSERT INTO `instructor_profiles` (`id`, `instructor_id`, `degree`, `field_of_study`, `university_name`, `graduation_year`, `organization_name`, `position`, `subject_taught`, `years_experience`, `start_date`, `end_date`, `description`, `language`, `curriculum_vitae`, `created_at`, `updated_at`) VALUES
(1, 22, 'High School Diploma', 'bbbb', 'ffff', '2003', 'qweqwe', 'qwrqwrqw', 'sdfsdfs', '23', '2025-04-24', '2025-04-07', 'asfsadfasd', '4', 'upload/cv/1744425953.pdf', NULL, NULL),
(2, 37, 'High School Diploma', 'bbbb', 'ffff', '2001', 'qweqwe', 'qwrqwrqw', 'fff', '12', '2025-04-12', '2025-04-19', 'ASFASDFSDF', '4', 'upload/cv/1744426118.pdf', NULL, NULL),
(3, 38, 'High School Diploma', 'bbbb', 'ffff', '2000', 'qweqwe', 'ffff', 'fff', '123', '2025-04-11', '2025-04-30', 'ASDFDVASDVSD', '4', 'upload/cv/1744426312.pdf', NULL, NULL),
(4, 39, 'Bachelor\'s Degree', 'bbbb', 'ffff', '2003', 'qweqwe', 'qwrqwrqw', 'fff', '3', '2025-04-04', '2025-04-19', 'fwetwe4t', '5', 'upload/cv/1744531360.pdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_28_123459_create_categories_table', 2),
(6, '2024_12_31_075503_create_sub_categories_table', 3),
(7, '2025_01_03_133729_create_courses_table', 4),
(8, '2025_01_03_142958_create_course_goals_table', 4),
(9, '2025_01_15_033100_create_course_sections_table', 5),
(10, '2025_01_15_033128_create_course_lectures_table', 5),
(11, '2025_02_09_154949_create_wishlists_table', 6),
(12, '2025_02_13_041917_create_coupons_table', 7),
(13, '2025_02_16_043506_create_orders_table', 8),
(14, '2025_02_16_043519_create_payments_table', 8),
(15, '2025_02_16_145636_create_smtp_settings_table', 9),
(16, '2025_02_20_030454_create_questions_table', 10),
(17, '2025_02_28_154414_create_reviews_table', 11),
(18, '2025_03_03_140723_create_blog_categories_table', 12),
(19, '2025_03_04_041954_create_blog_posts_table', 13),
(20, '2025_03_06_021139_create_notifications_table', 14),
(21, '2025_03_06_064448_create_site_settings_table', 15),
(22, '2025_03_07_045601_create_permission_tables', 16),
(23, '2025_03_10_064206_create_chat_messages_table', 17),
(26, '2025_03_18_143317_create_testimonials_table', 18),
(27, '2025_03_21_052516_create_comments_table', 19),
(28, '2025_03_21_053325_create_replies_table', 19),
(33, '2025_04_10_054340_create_quizzes_table', 24),
(34, '2025_04_11_023654_create_quiz_results_table', 25),
(35, '2025_04_11_093649_create_instructor_profiles_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 9),
(9, 'App\\Models\\User', 20),
(10, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1b6ce814-3210-4bf2-b6da-a661e0649f6c', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New Cod Enrollment In Course\"}', '2025-03-05 23:06:47', '2025-03-05 19:42:33', '2025-03-05 23:06:47'),
('2a48200f-5f83-4c86-a958-62badaeab9e0', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 6, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-03-16 06:12:19', '2025-03-16 06:12:19'),
('3c73752f-646c-4fba-b904-8896791906d2', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 15:10:49', '2025-04-14 15:10:49'),
('4a99950c-6ff3-4d80-a542-54a60249c43c', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 37, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 15:10:49', '2025-04-14 15:10:49'),
('67d514db-db69-4aa5-a466-338f452d965f', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 6, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-03-05 20:52:49', '2025-03-05 20:52:49'),
('6b041dd1-51bf-4dbb-b284-fd8995b6628b', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New Cod Enrollment In Course\"}', '2025-03-28 05:24:34', '2025-03-16 20:33:23', '2025-03-28 05:24:34'),
('6e0e5b9a-05fe-4db3-9fc9-6665b94cf2ce', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 37, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 03:13:26', '2025-04-14 03:13:26'),
('7c3b200b-f9fe-4b88-8e8f-0ef69f28d4ba', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 23, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 15:10:49', '2025-04-14 15:10:49'),
('836586f7-2308-43d7-ad7b-7e1922a5629a', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 6, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-03-05 19:42:33', '2025-03-05 19:42:33'),
('99e0f2c1-dcb0-4e12-8c7b-6748c84b1aa8', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 03:13:26', '2025-04-14 03:13:26'),
('9e3bee8f-6757-480e-acde-9cd711459353', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New Cod Enrollment In Course\"}', '2025-03-28 05:24:36', '2025-03-16 06:12:19', '2025-03-28 05:24:36'),
('b2a88e19-b4d2-4fa6-b84d-dec101dda121', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 40, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 15:10:49', '2025-04-14 15:10:49'),
('c18597c7-5aa6-46a0-83f6-4e4585767dc3', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 6, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 03:13:26', '2025-04-14 03:13:26'),
('cbb166c8-83db-49a6-91e5-d7b204bca2c3', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 2, '{\"message\":\"New Cod Enrollment In Course\"}', '2025-03-05 23:06:36', '2025-03-05 20:52:49', '2025-03-05 23:06:36'),
('d373d5c8-a71c-4fda-bf2c-d072e80497e6', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 40, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 03:13:26', '2025-04-14 03:13:26'),
('d4be61f4-8e49-4a66-bbf3-af413c1a62e1', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 23, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 03:13:26', '2025-04-14 03:13:26'),
('ea1088a1-b54d-4c91-9782-4aef547483c2', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 6, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-03-16 20:33:23', '2025-03-16 20:33:23'),
('fdc61a8c-aae2-4cd6-a9b8-ebd5296f9f0a', 'App\\Notifications\\OrderComplete', 'App\\Models\\User', 6, '{\"message\":\"New Cod Enrollment In Course\"}', NULL, '2025-04-14 15:10:49', '2025-04-14 15:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `payment_id`, `user_id`, `course_id`, `instructor_id`, `course_title`, `price`, `created_at`, `updated_at`) VALUES
(28, 43, 4, 14, 2, NULL, 300, NULL, NULL),
(29, 44, 4, 22, 2, 'Business English: Communicate Like a Pro', 500, '2025-04-14 15:10:40', '2025-04-14 15:10:40'),
(30, 45, 3, 14, 2, 'Grammar Made Simple: Master English Tenses Easily', 5055000, '2025-04-14 16:53:26', NULL),
(31, 46, 3, 16, 2, NULL, 450, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `email`, `phone`, `address`, `cash_delivery`, `total_amount`, `payment_type`, `invoice_no`, `order_date`, `order_month`, `order_year`, `status`, `created_at`, `updated_at`) VALUES
(43, 'Onis', 'onis@gmail.com', '089525907023', 'Indonesia', NULL, '240', 'Stripe', 'EOS48039773', '14 April 2025', 'April', '2025', 'confirm', '2025-04-14 15:01:09', '2025-04-14 15:01:58'),
(44, 'Onis', 'onis@gmail.com', '089525907023', 'Indonesia', 'handcash', '500', 'Direct Payment', 'EOS41044549', '14 April 2025', 'April', '2025', 'confirm', '2025-04-14 15:10:40', '2025-04-14 17:35:09'),
(45, 'User', 'user@gmail.com', '1234567890', 'Sukamaju', 'midtrans', '5055000', 'Midtrans', 'EOSb0807fec-2afd-4e1f-9fd2-e7dabd20479b', '14 April 2025', 'April', '2025', 'confirm', '2025-04-14 16:52:48', '2025-04-14 16:53:26'),
(46, 'User', 'user@gmail.com', '1234567890', 'Sukamaju', NULL, '450', 'Stripe', 'EOS52738324', '15 April 2025', 'April', '2025', 'confirm', '2025-04-14 23:57:05', '2025-04-14 23:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'category.menu', 'web', 'Category', '2025-03-06 23:35:40', '2025-03-06 23:35:40'),
(2, 'category.all', 'web', 'Category', '2025-03-06 23:36:38', '2025-03-07 18:36:52'),
(4, 'category.edit', 'web', 'Category', '2025-03-07 01:16:18', '2025-03-07 01:16:18'),
(5, 'category.delete', 'web', 'Category', '2025-03-07 01:16:33', '2025-03-07 01:16:33'),
(6, 'category.add', 'web', 'Category', '2025-03-07 01:16:48', '2025-03-07 01:16:48'),
(7, 'instructor.menu', 'web', 'Instructor', '2025-03-07 01:17:12', '2025-03-07 01:17:12'),
(8, 'coupon.menu', 'web', 'Coupon', '2025-03-07 01:17:30', '2025-03-07 01:17:30'),
(9, 'coupon.all', 'web', 'Coupon', '2025-03-07 01:17:45', '2025-03-07 01:17:45'),
(10, 'coupon.add', 'web', 'Coupon', '2025-03-07 01:18:01', '2025-03-07 01:18:01'),
(11, 'coupon.edit', 'web', 'Coupon', '2025-03-07 01:18:16', '2025-03-07 01:18:16'),
(12, 'coupon.delete', 'web', 'Coupon', '2025-03-07 01:18:32', '2025-03-07 01:18:32'),
(13, 'setting.menu', 'web', 'Setting', '2025-03-07 01:19:49', '2025-03-07 01:19:49'),
(14, 'order.menu', 'web', 'Orders', '2025-03-07 01:20:04', '2025-03-07 01:20:04'),
(15, 'report.menu', 'web', 'Report', '2025-03-07 01:20:17', '2025-03-07 01:20:17'),
(16, 'review.menu', 'web', 'Review', '2025-03-07 01:20:31', '2025-03-07 01:20:31'),
(17, 'all.user.menu', 'web', 'All User', '2025-03-07 01:20:44', '2025-03-07 01:20:44'),
(18, 'blog.menu', 'web', 'Blog', '2025-03-07 01:20:58', '2025-03-07 01:20:58'),
(20, 'role.permission.menu', 'web', 'Role and Permission', '2025-03-07 02:58:31', '2025-03-07 02:58:31'),
(21, 'subcategory.all', 'web', 'Category', '2025-03-07 06:40:22', '2025-03-07 06:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `user_id`, `instructor_id`, `parent_id`, `subject`, `question`, `created_at`, `updated_at`) VALUES
(7, 14, 4, 2, NULL, 'About grammar', 'I have a question for you', '2025-04-14 15:05:52', NULL),
(8, 14, 4, 2, 7, NULL, 'okay what is it?', '2025-04-14 15:06:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('pg_text','essay_text','pg_audio','essay_audio') COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_id`, `question`, `type`, `options`, `correct_answer`, `audio_path`, `created_at`, `updated_at`) VALUES
(1, 14, 'Which sentence is in the present perfect tense?', 'pg_text', '\"[\\\"I eat breakfast every day.\\\",\\\"I have eaten breakfast already.\\\",\\\"I will eat breakfast later.\\\",\\\"I was eating breakfast.\\\"]\"', 'I have eaten breakfast already.', NULL, '2025-04-09 23:29:45', '2025-04-09 23:29:45'),
(2, 14, 'By the time you arrive, we __________ (eat) dinner.', 'essay_text', NULL, 'will have eaten', NULL, '2025-04-09 23:30:48', '2025-04-09 23:30:48'),
(4, 14, '22', 'pg_text', '\"[\\\"11\\\",\\\"22\\\",\\\"33\\\"]\"', '22', NULL, '2025-04-10 20:48:03', '2025-04-10 20:48:03'),
(5, 15, 'What is You in spanish?', 'pg_text', '\"[\\\"I eat breakfast every day.\\\",\\\"b\\\",\\\"c\\\"]\"', 'I eat breakfast every day.', NULL, '2025-04-12 21:07:02', '2025-04-12 21:07:02'),
(6, 14, NULL, 'essay_audio', NULL, 'Die', 'http://127.0.0.1:8000/quizzes_audio/GLp90pH6qOYOxOg6VBcZI45ObmI1ZinDefiz8DoG.mp3', '2025-04-14 16:46:42', '2025-04-14 16:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `correct_answers` decimal(11,5) NOT NULL,
  `wrong_answers` decimal(11,5) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `correct_answer_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`correct_answer_data`)),
  `wrong_answer_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`wrong_answer_data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `course_id`, `correct_answers`, `wrong_answers`, `score`, `created_at`, `updated_at`, `correct_answer_data`, `wrong_answer_data`) VALUES
(26, 4, 14, 75.00000, 3.00000, 1, '2025-04-14 15:04:16', '2025-04-14 15:04:16', NULL, NULL),
(27, 3, 14, 60.00000, 3.00000, 2, '2025-04-14 16:54:18', '2025-04-14 16:54:18', NULL, NULL),
(28, 3, 14, 100.00000, 5.00000, 0, '2025-04-14 17:00:13', '2025-04-14 17:00:13', NULL, NULL),
(29, 3, 14, 60.00000, 3.00000, 2, '2025-04-14 19:35:01', '2025-04-14 19:35:01', '[{\"question\":\"Which sentence is in the present perfect tense?\",\"selected\":\"I have eaten breakfast already.\",\"correct\":\"I have eaten breakfast already.\"},{\"question\":\"22\",\"selected\":\"22\",\"correct\":\"22\"},{\"question\":\"What is You in spanish?\",\"selected\":\"I eat breakfast every day.\",\"correct\":\"I eat breakfast every day.\"}]', '[{\"question\":\"By the time you arrive, we __________ (eat) dinner.\",\"selected\":\"djeuwfh\",\"correct\":\"will have eaten\"},{\"question\":null,\"selected\":\"der\",\"correct\":\"Die\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogpost_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `blogpost_id`, `user_id`, `comment_id`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 4, 5, 'HI', '0', '2025-03-29 07:32:57', NULL),
(12, 2, 3, 6, 'Really? me too', '1', '2025-03-29 07:33:46', '2025-04-15 00:02:46'),
(13, 1, 4, 7, 'Yeah', '0', '2025-03-31 02:00:13', '2025-04-15 00:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `course_id`, `user_id`, `comment`, `rating`, `instructor_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 14, 22, 'This is a really good course', '4', 2, '1', '2025-03-22 20:59:00', '2025-03-22 23:33:28'),
(7, 14, 3, 'I love this course so much', '5', 2, '1', '2025-03-22 23:37:19', '2025-03-22 23:38:27'),
(8, 14, 4, 'I really need this course so much. Thanks!', '5', 2, '1', '2025-03-22 23:38:05', '2025-03-22 23:38:27'),
(9, 14, 3, 'This is a really wonderful course. Thanks!', '4', 2, '1', '2025-03-23 20:33:34', '2025-03-23 20:38:05'),
(10, 14, 3, 'THIS IS GONNA BE THE BEST COURSE EVER!', '5', 2, '0', '2025-03-23 20:34:19', '2025-04-15 00:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'web', '2025-03-08 00:23:31', '2025-03-08 00:23:31'),
(9, 'Super Admin', 'web', '2025-03-08 00:24:04', '2025-03-08 00:24:04'),
(10, 'Manager', 'web', '2025-03-08 22:26:28', '2025-03-08 22:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 7),
(1, 9),
(2, 7),
(2, 9),
(4, 7),
(4, 9),
(5, 7),
(5, 9),
(6, 7),
(6, 9),
(7, 7),
(7, 9),
(7, 10),
(8, 9),
(9, 9),
(10, 9),
(11, 9),
(12, 9),
(13, 9),
(14, 9),
(15, 9),
(16, 9),
(17, 7),
(17, 9),
(17, 10),
(18, 7),
(18, 9),
(18, 10),
(20, 9),
(21, 7),
(21, 9);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone`, `email`, `address`, `facebook`, `twitter`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1826127615411278.png', '08814580036', 'azlia@gmail.com', 'Canberra, Australia, 105 South Park Avenue', '#', '#', '© 2025 Linguana. All Rights Reserved. by Azlia', NULL, '2025-04-14 17:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `from_address`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'sandbox.smtp.mailtrap.io', '2525', '9ea638fe1bcee4', 'acf073652a86e3', 'tls', 'linguana@gmail.com', NULL, '2025-02-16 08:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 3, 'Web Development', 'web-development', NULL, NULL),
(2, 3, 'Mobile Apps', 'mobile-apps', NULL, '2025-01-01 06:06:53'),
(3, 3, 'Game Development', 'game-development', NULL, NULL),
(4, 1, 'Finance', 'finance', NULL, NULL),
(5, 1, 'Entrepreneurship', 'entrepreneurship', NULL, NULL),
(6, 1, 'Real Estate', 'real-estate', NULL, NULL),
(7, 4, 'it Certificatio', 'it-certificatio', NULL, NULL),
(8, 4, 'Hardware', 'hardware', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '4', 'This is such a really good course if you want to learn language intensively', '1', '2025-03-19 00:33:01', '2025-03-19 08:20:41'),
(2, 3, '4', 'I love this course so much, it has a different type of learning method', '1', '2025-03-19 00:34:30', '2025-03-19 08:08:26'),
(3, 3, '5', 'Linguana is a really great language course', '1', '2025-03-19 00:42:09', '2025-03-19 08:02:12'),
(6, 4, '4', 'I\'m in love with this course, thank you for teaching me.', '1', '2025-03-19 20:57:59', '2025-03-19 21:01:16'),
(7, 3, '4', 'Linguana is a really great language course', '0', '2025-03-24 00:20:27', NULL),
(8, 3, '4', 'I love this', '1', '2025-04-14 02:38:29', '2025-04-14 02:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','instructor','user') COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `last_seen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$K/vqnSm3BLgaL9PgcrNWCOaeOSD7YHzb0zueEhPkjDCdbAS4joka6', '202412221500cat profile 2.jpg', '1234', 'Indonesia', 'admin', '1', '2025-04-15 07:04:25', NULL, NULL, '2025-04-15 00:04:25'),
(2, 'Instructor', 'instructor', 'instructor@gmail.com', NULL, '$2y$10$/DsOa07xfd4gOcL.M/JUh.gEW22ERgiQx9bmzDoqaeAgereWFNhn6', '202412241046profile photo.jpg', '993', 'Indonesia', 'instructor', '1', '2025-04-15 07:07:38', NULL, '2025-02-04 07:11:01', '2025-04-15 00:07:38'),
(3, 'User', 'user', 'user@gmail.com', NULL, '$2y$10$9SmCs4RFBq96suBtXs2ICe.8hBTCPhy96dYCVtMp5Cfm623VlTsLa', '202412271457bebek.jpg', '1234567890', 'Sukamaju', 'user', '1', '2025-04-15 06:57:28', 'wfazt47PIYEVuzC5zWzFPT4azq7y87KlzX5GlpgRA80Tk83HQTYM7ns2SFML', NULL, '2025-04-14 23:57:28'),
(4, 'Onis', 'onis', 'onis@gmail.com', NULL, '$2y$10$atY1WAY3AQTlkhxLlKpGWeUnFk.Q9I8vWk6ruXM9Ars7bBcUvDAfS', '20241227150120240130_050807.jpg', '089525907023', 'Indonesia', 'user', '1', '2025-04-14 23:54:59', NULL, '2024-12-19 05:30:18', '2025-04-14 16:54:59'),
(5, 'Batu Karang', 'batukarang', 'batukarang@gmail.com', NULL, '$2y$10$dM8vlhsaFf7h10MVhAUtZuJrKLOwX2mqKFuhGxPocj8UrQVWxDzBG', '202412271447cat glasses.jpg', '0888', 'BBC', 'user', '1', NULL, NULL, '2024-12-25 04:13:09', '2024-12-27 07:49:12'),
(6, 'Azlia', 'azlia', 'azlia@gmail.com', NULL, '$2y$10$dM8vlhsaFf7h10MVhAUtZuJrKLOwX2mqKFuhGxPocj8UrQVWxDzBG', NULL, '0881', 'Indonesia', 'instructor', '1', '2025-03-28 14:46:14', NULL, NULL, '2025-03-28 07:46:14'),
(9, 'afifah', 'Afifah', 'afifah@gmail.com', NULL, '$2y$10$7vVTRlak4RE0qYlJycLvheRr5pvAjtguMVX.XG1FEn1uE1BvphHO6', NULL, '1212', 'Ciwidey', 'admin', '1', NULL, NULL, '2025-03-07 23:59:41', '2025-03-07 23:59:41'),
(10, 'oyen', 'Oyen', 'oyen@gmail.com', NULL, '$2y$10$TM3/bOPbaB89f6Hy/Ks8Nu9eBbDB4meNHeMpGflvDtO96S.UtgpbO', NULL, '1111', 'Ciwidey', 'admin', '1', '2025-03-09 11:41:36', NULL, '2025-03-08 00:02:36', '2025-03-09 04:41:36'),
(20, 'Muhammad Abyan', 'Byndewan', 'abyan@abyan.com', NULL, '$2y$10$.STjJSbW2C6mP742jD5rEeTdLyW3dv8xOdTk1/3j90UkXO5bnBFDW', '202503090535WhatsApp Image 2024-08-27 at 22.52.41_b131a581.jpg', '1234567890', 'kepo', 'admin', '1', '2025-03-09 05:37:50', NULL, '2025-03-08 00:40:40', '2025-03-08 22:37:50'),
(22, 'Ainun Nabila Ramadhita', NULL, 'ainun@gmail.com', NULL, '$2y$10$eAUog/ORTdTWUsCFQ36WPOKkYVoWze8khY/5sIqyGkhZTFplxDH0.', NULL, NULL, NULL, 'user', '1', '2025-03-23 03:58:41', NULL, '2025-03-22 20:11:17', '2025-03-22 20:58:41'),
(23, 'Lena Holloway', 'Lena Holloway', 'lena@gmail.com', NULL, '$2y$10$K/vqnSm3BLgaL9PgcrNWCOaeOSD7YHzb0zueEhPkjDCdbAS4joka6', NULL, '081234567890', '157 Hollowbrook Lane, Ravenshire, NY 12847, USA', 'instructor', '1', '2025-03-31 07:23:28', NULL, NULL, '2025-03-31 00:23:28'),
(37, 'AAAAA', 'AAAAAA', 'AAA@AAAA.AAA', NULL, '$2y$10$yt3HSAiSb5AckymH2nYed.4Iw9dfdpTcJ2w.nAwG/94gSGOyeZxjG', NULL, '12121212', 'bbbbb', 'instructor', '1', NULL, NULL, '2025-04-11 19:48:11', '2025-04-12 22:17:50'),
(41, 'shine', NULL, 'shine@gmail.com', NULL, '$2y$10$B3rRq0Is/TMR8UHCXgIOF.k7/0vHDwMnpYyklUL6BFB5AXCrpzY6y', NULL, NULL, NULL, 'user', '1', '2025-04-14 10:14:54', NULL, '2025-04-14 03:14:53', '2025-04-14 03:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(15, 3, 22, '2025-04-14 02:41:41', NULL),
(16, 4, 15, '2025-04-14 02:57:41', NULL),
(17, 4, 14, '2025-04-14 07:34:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blogpost_id_foreign` (`blogpost_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_goals`
--
ALTER TABLE `course_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_lectures`
--
ALTER TABLE `course_lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_sections`
--
ALTER TABLE `course_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructor_profiles`
--
ALTER TABLE `instructor_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_results_user_id_foreign` (`user_id`),
  ADD KEY `quiz_results_course_id_foreign` (`course_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_blogpost_id_foreign` (`blogpost_id`),
  ADD KEY `replies_user_id_foreign` (`user_id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_course_id_foreign` (`course_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `course_goals`
--
ALTER TABLE `course_goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `course_lectures`
--
ALTER TABLE `course_lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_sections`
--
ALTER TABLE `course_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_profiles`
--
ALTER TABLE `instructor_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blogpost_id_foreign` FOREIGN KEY (`blogpost_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_blogpost_id_foreign` FOREIGN KEY (`blogpost_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
