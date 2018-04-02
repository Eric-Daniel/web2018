--
-- Database: "amlsdb"
--

-- --------------------------------------------------------

--
-- Create database if not exists
--
drop database if exists amlsdb;
create database amlsdb;
use amlsdb;

-- --------------------------------------------------------
--
-- Table structure for table "admin"
--


CREATE TABLE admin (
  name varchar(20) NOT NULL,
  pass varchar(100) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table "admin"
--

INSERT INTO admin (name, pass) VALUES
("admin", "admin");

-- --------------------------------------------------------

--
-- Table structure for table "tbl_movies"
--

CREATE TABLE movies (
  movie_id int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  title varchar(100) NOT NULL,
  year int not null,
  genre varchar(100) NOT NULL,
  image varchar(100) NOT NULL,
  synopsis varchar(1000)
) ENGINE=InnoDB;

--
-- Dumping data for table "tbl_movies"
--

INSERT INTO movies(title, year, genre, image, synopsis) VALUES
("Pacific Rim Uprising",2018, "Action, Adventure, Sci-Fi","pacificRimUprising.jpg","Jake Pentecost, son of Stacker Pentecost, reunites with Mako Mori to lead a new generation of Jaeger pilots, including rival Lambert and 15-year-old hacker Amara, against a new Kaiju threat."),
("Early Man",2018,"Animation, Adventure, Comedy","earlyman.jpg","Set at the dawn of time, when prehistoric creatures and woolly mammoths roamed the earth, Early Man tells the story of Dug, along with sidekick Hognob as they unite his tribe against a mighty enemy Lord Nooth and his Bronze Age City to save their home."),
("Aiyaary",2018,"Action, Crime, Drama","aiyaary.jpg","Two officers with patriotic hearts suddenly have a fallout. The mentor, Colonel Abhay Singh has complete faith in the country's system while protégé Major Jai Bakshi thinks differently due to a recent stint in surveillance."),
("Black Panther",2018,"Action, Adventure, Sci-Fi","blackPanther.jpg","T'Challa, the King of Wakanda, rises to the throne in the isolated, technologically advanced African nation, but his claim is challenged by a vengeful outsider who was a childhood victim of T'Challa's father's mistake."),
("The Monkey King 3",2018,"Action, Adventure, Fantasy","theMonkeyKing3.jpg","A travelling monk and his followers find themselves trapped in a land inhabited by only women."),
("Peter Rabbit",2018,"Animation, Adventure, Comedy","peterRabbit.jpg","Feature adaptation of Beatrix Potter's classic tale of a rebellious rabbit trying to sneak into a farmer's vegetable garden."),
("The 15:17 to Paris",2018,"Drama, History, Thriller","the1517ToParis.jpg","Three Americans discover a terrorist plot aboard a train while in France."),
("Maze Runner: The Death Cure",2018,"Action, Sci-Fi, Thriller","mazeRunner.jpg","Young hero Thomas embarks on a mission to find a cure for a deadly disease known as the 'Flare'."),
("Jumanji",2017,"Action, Adventure, Comedy","jumanji.jpg","Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game."),
("The Greatest Showman",2017," Biography, Drama, Musical","theGreatestShowman.jpg","Celebrates the birth of show business, and tells of a visionary who rose from nothing to create a spectacle that became a worldwide sensation.");


--
-- Indexes for table "movies"
--
ALTER TABLE movies
 





