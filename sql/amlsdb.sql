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


CREATE TABLE IF NOT EXISTS admin (
  username varchar(20) NOT NULL,
  password varchar(100) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table "admin"
--

INSERT INTO admin (username, password) VALUES
("admin", "admin");

-- --------------------------------------------------------

--
-- Table structure for table "tbl_movies"
--

CREATE TABLE IF NOT EXISTS movies (
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
("Pacific Rim Uprising",2018, "Action","pacificRimUprising.jpg","Jake Pentecost, son of Stacker Pentecost, reunites with Mako Mori to lead a new generation of Jaeger pilots, including rival Lambert and 15-year-old hacker Amara, against a new Kaiju threat."),
("Early Man",2018,"Animation","earlyman.jpg","Set at the dawn of time, when prehistoric creatures and woolly mammoths roamed the earth, Early Man tells the story of Dug, along with sidekick Hognob as they unite his tribe against a mighty enemy Lord Nooth and his Bronze Age City to save their home."),
("Aiyaary",2018,"Crime","aiyaary.jpg","Two officers with patriotic hearts suddenly have a fallout. The mentor, Colonel Abhay Singh has complete faith in the country's system while protégé Major Jai Bakshi thinks differently due to a recent stint in surveillance."),
("Black Panther",2018,"Science-Fiction","blackPanther.jpg","T'Challa, the King of Wakanda, rises to the throne in the isolated, technologically advanced African nation, but his claim is challenged by a vengeful outsider who was a childhood victim of T'Challa's father's mistake."),
("The Monkey King 3",2018,"Fantasy","theMonkeyKing3.jpg","A travelling monk and his followers find themselves trapped in a land inhabited by only women."),
("Annihilation",2018,"Fantasy","annihilation.jpg","A biologist signs up for a dangerous, secret expedition into a mysterious zone where the laws of nature don't apply."),
("Peter Rabbit",2018,"Animation","peterRabbit.jpg","Feature adaptation of Beatrix Potter's classic tale of a rebellious rabbit trying to sneak into a farmer's vegetable garden."),
("The 15:17 to Paris",2018,"Drama","the1517ToParis.jpg","Three Americans discover a terrorist plot aboard a train while in France."),
("Ready Player One",2018,"Sci-Fi","readyPlayerOne.jpg","When the creator of a virtual reality world called the OASIS dies, he releases a video in which he challenges all OASIS users to find his Easter Egg, which will give the finder his fortune."),
("Maze Runner: The Death Cure",2018,"Science-Fiction","mazeRunner.jpg","Young hero Thomas embarks on a mission to find a cure for a deadly disease known as the 'Flare'."),
("Jumanji",2017,"Action","jumanji.jpg","Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game."),
("Molly's Game",2017,"Drama","molly'sGame.jpg","The true story of Molly Bloom, an Olympic-class skier who ran the world's most exclusive high-stakes poker game and became an FBI target."),
("The Greatest Showman",2017,"Drama","theGreatestShowman.jpg","Celebrates the birth of show business, and tells of a visionary who rose from nothing to create a spectacle that became a worldwide sensation."),
("Three Billboards Outside Ebbing, Missouri",2017,"Crime","threeBillboardsOutsideEbbing_Missouri.jpg","A mother personally challenges the local authorities to solve her daughter's murder when they fail to catch the culprit."),
("Miracles From Heaven",2016,"Drama","miraclesFromHeaven.jpg","MIRACLES FROM HEAVEN is based on the incredible true story of the Beam family. When Christy (Jennifer Garner) discovers her 10-year-old daughter Anna (Kylie Rogers) has a rare, incurable disease, she becomes a ferocious advocate for her daughter's healing as she searches for a solution."),
("Allegiant",2016,"Mystery","allegiant.jpg","After the earth-shattering revelations of Insurgent, Tris must escape with Four beyond the wall that encircles Chicago, to finally discover the shocking truth of the world around them."),
("The Conjuring 2",2016,"Horror","theConjuring2.jpg","Ed and Lorraine Warren travel to North London to help a single mother raising 4 children alone in a house plagued by a supernatural spirit."),
("Insurgent",2015,"Sci-Fi","insurgent.jpg","Beatrice Prior must confront her inner demons and continue her fight against a powerful alliance which threatens to tear her society apart with the help from others on her side."),
("Paranormal Activity: The Ghost Dimension",2015,"Horror","paranormalActivity-TheGhostDimension.jpg","Using a special camera that can see spirits, a family must protect their daughter from an evil entity with a sinister plan."),
("Maleficent",2014,"Action","maleficent.jpg","A vengeful fairy is driven to curse an infant princess, only to discover that the child may be the one person who can restore peace to their troubled land."),
("Divergent",2014,"Adventure","divergent.jpg","In a world divided by factions based on virtues, Tris learns she's Divergent and won't fit in. When she discovers a plot to destroy Divergents, Tris and the mysterious Four must find out what makes Divergents dangerous before it's too late."),
("The Conjuring",2013,"Horror","theConjuring.jpg","Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse."),
("12 Years A Slave",2013,"Drama","12YearsASlave.jpg","In the antebellum United States, Solomon Northup, a free black man from upstate New York, is abducted and sold into slavery."),
("G.I. Joe: Retaliation",2013,"Sci-Fi","G_I_Joe-Retaliation.jpg","The G.I. Joes are not only fighting their mortal enemy Cobra; they are forced to contend with threats from within the government that jeopardize their very existence."),
("Argo",2012,"Drama","argo.jpg","Acting under the cover of a Hollywood producer scouting a location for a science fiction film, a CIA agent launches a dangerous operation to rescue six Americans in Tehran during the U.S. hostage crisis in Iran in 1979."),
("The Hunger Games",2012,"Sci-Fi","theHungerGames.jpg","Katniss Everdeen voluntarily takes her younger sister's place in the Hunger Games: a televised competition in which two teenagers from each of the twelve Districts of Panem are chosen at random to fight to the death."),
("Sinister",2012,"Horror","sinister.jpg","Washed-up true-crime writer Ellison Oswalt finds a box of super 8 home movies that suggest the murder he is currently researching is the work of a serial killer whose work dates back to the 1960s.");




--
-- Indexes for table "movies"
--
ALTER TABLE movies
 





