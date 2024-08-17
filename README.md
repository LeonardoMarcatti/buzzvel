<p></p>
<h1>Introduction</h1>
<p>The following instrictions provides explanations about how to use this API by describing how to setup everything that is necessary to use it. </p>
<p>The building of this API is part of a Buzzvel challenge to find an candidate for joining its team.</p>
<p>Once you have cloned the project to your system you have to open an Terminal on the folder your project is located and run <b>composer install.</b> This will install the project as well as all depencencies it requires.</p>

<h2>Setup Your System</h2>
<h3>Intro</h3>
<p>It is necessary to make some ajustments on your .env and .env.testing files located inside the project folder. There you must setup some parameters in order this project to run smoothly.</p>
<p>First of all, it is important to have an data bank user with permissions to manage buzzvel bank actions like, create, read, update and delete.</p>
<p>In both .env and .env.testing files make the following changes:</p> 
APP_URL=ip_address/path_to_folder/buzzvel/public/
<b><small>This is the only modification you do not need to make in .env.testing file</small></b>
<p></p>
<p>The APP_URL represent the main entrance for your system.</p>
<p>DB_CONNECTION=your_DB</p> - <small>Some options are: mysql, mariadb, pgsql, sqlite or sqlsrv</small>
<p>DB_HOST=IP address</p>
<p>DB_PORT=port number</p>
<p>DB_DATABASE=buzzvel</p>
<p>DB_USERNAME=username</p>
<p>DB_PASSWORD=your password</p>

<h2>Data Bank</h2>
<h2>Intro</h2>
<p>The data bank was build with only three tables - holiday, participants and holidays_participants. The reason behind this is to allow more felxibiliy when it comes to creation of participants as well as holidays.</p>
<p>In order to create the data bank it is necessary to entrer in the project folder and type <b>php artisan migrate</b></p>
<h3>Holiday Table</h3>
<p>It contains information about holidays. The most importante ones are: id, title, description, location, and date. All of them are string type except for td and date.</p>
<h3>Participants Table</h3>
<p>It holds information about people who will participate on holidays trips. Here the most important information are id(integer) and name(string).</p>
<h3>Holidays_Participants Table</h3>
<p>This table connects both holiday and participants table together. Since a holiday may have many participants and a participant may be present in more then one holiday trip this table is a must.</p>
<p>It contains the ids for holidays and participants that are necessary to connect both tables.</p>

<h2>Endpoints</h2>
<h3>Intro</h3>
<p>For some endpoints it is necessary to send some data in order to get what is wanted. It is the case of POST method endpoints like login, logup, getPlan, getAllPlans, getPFD, addParticipant and PUT method like updatePlan or updateParticipant</p>
<p>The data that must be send to API must follow JSON format key/value inside curly braces like in the example below</p>
<p><b>
{
    "key1" : "value1",
    "key2" : "value2",
    "key3" : "value3",
    .
    .
    .
}
</b></p>
<p>When using API testing programs like Postman or Insomnia it is necessary to ajust some headers parameters in order Laravel to understand that the client is an API client. It is requred to set Accept and Content-Type to application/json.</p>
<p>In general every response from any endpoint will follow this pattern: ['status' => boolean, data]. Exception are for logup, login and logout.</p>
<h3>Login, Logoup and Logout Endpoints</h3>
<h4>api/logup</h4>
<p>Here we send the following data: name, email, password and password_confirmation</p>
<p>After sending the correct data to the API a message about the creation of a new user is send back to the client. On the other hand, if send missing data or wrong data a message will be returned about what went wrong.</p>
<h4>api/login</h4>
<p>Login is necessary to get your access token. Here you send your email address and your password.</p>
<p>After getting your token you have to save it and use it on the body of your future requisitions. For instance if you use JavaScript to fetch some data you must set up the headers like following:</p>
<b>
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${your_token}`
    } 
</b>
<h4>api/logout</h4>
<p>Here you do not need to send anything. Just send an GET request and all your active tokens will be erased.</p>

<h3>Paricipants Endpoints</h3>
<h4>api/participant/new</h4>
<p>In this endpoint you create a new participant. For this it is required to send the name.</p>
<h4>api/participant/getParticipant</h4>
<p>In this endpoint you retrieve data about any participant. To get data about an particular participant you need to send the name or id.</p>
<p>You do not need to know the entire name of the participant. It requires just part of the name and a list of participants will be retrieved.</p>
<h4>api/participants/getAllParticipants</h4>
<p>This endpoint provides all participants found in the data bank. It does not require any data to be send to it.</p>
<h4>api/updateparticipant/?</h4>
<p>This endpoint aims to update the participant name. Replace the ? symbol for the id number of the participant you want to change. For this to work you must send the name only.</p>

<h3>Holidays Endpoints</h3>
<h4>api/holiday/new</h4>
<p>This endpoint is for creating a new holiday. Here you must send the following data: title, description, date and location. All of those are string types data.</p>
<h4>api/holiday/?</h4>
<p>In this endpoint replace the '?' symbol for an id number to get data about a particular holiday.</p>
<h4>api/holiday/all</h4>
<p>Here you will find a list of all holidays saved with all participants in each one.</p>
<h4>api/holiday/addParticipants</h4>
<p>In this endpoint you will add participants to holidays. In order to do this you must have at least one holiday saved on data bank as well as one participant.</p>
<p>For this you must send the id for the holiday and an array containing the ids of each participant.</p>
<p><b>Example: {
    "holiday" : 2,
    "participants" : [1, 3, 4, 8]
}</b></p>
<h4>api/updateHoliday/?</h4>
<p>This is the endpoint for updating any holiday you want. Just replace the '?' symbol for the id number of holiday required. For this to work you got to send any or all of the following data: title, location, date or description.</p>
<h4>api/holiday/pdf/?</h4>
<p>In this endpoint you download a PDF file with informations about a holiday sicha as title, description, date, location and participants. All you have to do is replace the ? symbol for the id number of a particular holiday.</p>
<h2>Testing</h2>
<h3>Intro</h3>
<p>One of the most importante features of this challenge is testing. Inside tests folder there are two types of test - unit test and feature test. Unit test are reponsable for testing small portions of applications and on the other hand feature test are responsable for testing how different parts of application interact with one another.</p>
<p>You will find five files inside unit test folder. They are: AuthTest, HolidayTest, PariticpantsTest, ErrorTests and LogoutTest. Each one aim to evaluate a certein group of features they are related to. AuthTest must be the very first test you must run because in one of the assertions inside of it you will get an token that you must add to other assertions and this token is a random string compose of several characters and its langth varies.</p>
<p>The test were designed with some dummy data to be used. If you dont want to used this dummy data you may provide your own but remember to make some changes in each test file.</p>
 <p>For some tests you will find Data Providers (dummy data) and they are for running the same test a few times for two reasons. First, to fulfill the data bank and for the use of other tests. Sencondly to make sure when running one test more than once we stress the system a little ensuring it is robust one.</p>
 <p>To run the tests you must open an terminal and enter the project root folder name buzzvel. Once there you type php artisan test --testsuite=unit tests/Unit/You_test_file.php</p>
 <p>The order of files that must be:</p>
 <ol>
    <li>AuthTest</li> <small>Get the token</small>
    <li>HolidayTest</li>
    <li>ParticipantsTest</li>
    <li>ErrorTest</li>
    <li>LogoutTest</li>
 </ol>

<h3>Auth Tests</h3>
<p>In this set of tests you will find tests ralated to authentication like login and logup In each one several assertions are made to make sure everything is correct.</p>
<h4>Logup Test</h4>
<p>The first test to run is named testLogup. In this test an user called John Doe will be created and a JSON response will return to be evaluated.</p>
<h4>Login Test</h4>
<p>The second test to run is very important as it provides the token you gonna need for others tests. The token will be displayed after the end of this test and you have to use it on other test sets like HolidayTest and PariticpantsTest. Here its e-mail and its password created in logup test will be used to evaluate the login feature.</p>
<p>On HolidayTest and PariticpantsTest you will see a message written <b>'place token here'</b> where you must use the token provided earlier.</p>
<h3>Holiday Tests</h3>
<p>This is a set of test for creating, reading, deleting and updating holidays. For this test to run you must enter the token retrieved in Auth Tests - Login Test. This token is necessary in order to allow API connections since only log in and log up do not need token to work.</p>
<h4>Create Holiday Test</h4>
<p>This is the first test to run and it needs a set of data to automaticaly create some holidays. This set of data is named holidayProviderData and it is responsible for providing data to that funcion.</p>
<h4>Get All Holidays Test</h4>
<p>The second test returns all holidays created earlier. Here the test suite assesses that every single one is exactly the way it should be.</p>
<h4>Get Holyday By ID Test</h4>
<p>In this test we retrieve a single holiday by its ID and evaluated it.</p>
<h4>Update Holiday Test</h4>
<p>For this to work it is necessary to provide some data. In this case it is provided the ID of the holiday as well as any data ralated to what is wanted to be change - title, location, date or description.</p>
<p>It is important to highlight that any or all data in the holiday can be changed so, only ID is mandatory data to be send here.</p>
<h4>Get PDF Test</h4>
<p>In this test it is evaluated the creation and download availability of a PDF file. To work it is necessary to provide the holiday ID.</p>
<h3>Participants Tests</h3>
<p>In this set of tests you will find several tests related to participants. Those tests are ment to create, update, read and delete (CRUD) participants on the data bank.</p>
<h4>Create Participant Test</h4>
<p>The first test is for the creation of participants. Only participants names are send here. For this to work there is a Data Provider named nameProvider</p>
<h4>Get All Participants Test</h4>
<p>In this test you will get every single participant found in data bank.</p>
<h4>Get Participant Test</h4>
<p>This test aim to get a single participant or a small group of participats depending on what is send as a data. If and id is to be sent a single participant will be retrieved. On the ohter hand if a name is what is sent more then one participant will be returned because the search by name is flexible and the system will look for an name that contains a string.</p>
<h4>Update Participant Test</h4>
<p>This test make some changes in participants. Here we change participants names only and after that the test evaluates if the processes was carried out rightly.</p>
<h4>Get All Participants After Updated Test</h4>
<p>After updating all participants we make a double check to see if all participants involved in the update process were updated correctly.</p>

<h3>Logout Test</h3>
<p>The last one is testLogout. This test depends on login as it provides to logout with the token. Here the token will be invalidated and after that is no possible to use it anymore.</p>
