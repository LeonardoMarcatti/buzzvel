<p></p>
<h1>Introduction</h1>
<p>The following instrictions provides explanations about how to use this API by describing how to setup everything that is necessary to use it. </p>
<p>The building of this API is part of a Buzzvel challenge to find an candidate for joining its team.</p>
<p>Once you have cloned the project to your system you have to open an Terminal on the folder your project is located and run <b>composer install.</b> This will install the project as well as all depencencies it requires.</p>

<h2>Setup Your System</h2>
<h3>Intro</h3>
<p>It is necessary to make some ajustments on your .env file located inside the project folder. There you must setup some parameters in order this project to run smoothly.</p>
<p>First of all, it is important to have an data bank user with permissions to manage buzzvel bank actions like, create, read, update and delete.</p>
<p>APP_URL=ip_address/path_to_folder/buzzvel/public/</p>
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
<p>It contains information about holidays. The most inportante ones are: id, title, description, location, and date. All of them are string type except for td and date.</p>
<h3>Participants Table</h3>
<p>It holds information about people who will participate on holidays trips. Here the most important information are id(integer) and name(string).</p>
<h3>Holidays_Participants Table</h3>
<p>This table connects both holiday and participants table together. Since a holiday may have many participants and a participant may be present in more then one holiday trip this table is a must.</p>
<p>It contains the ids for holidays and participants that are necessary to connect both tables.</p>

<h2>Endpoints</h2>
<h3>Intro</h3>
<p>For some endpoints it is necessary to send some data in order to get what is wanted. It is the case of POST method endpoints like login, logup, getPlan, getAllPlans, getPFD, addParticipant and PUT method like updatePlan or updateparticipant</p>
<p>The data that must be send to API must follow JSON format key/value inside curly braces like in the example above</p>
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
<p>After getting your token you have to save it and use it on the body of your future requisitions. For instance if you use JavaScript to fetch you may set up the headers like following:</p>
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

<h3>Holidays Endpoints</h3>
<h4>api/holiday/$</h4>
<p>In this endpoint replace the '$' symbol for an id number to get data about a particular holiday.</p>
<h4>api/holiday/all</h4>
<p>Here you will find a list of all holidays saved with all participants in each one.</p>
<h4>api/holiday/addParticipants</h4>
<p>In this endpoint you will add participants to holidays. In order to do this you must have at least one holiday saved on data bank as well as one participant.</p>
<p>For this you must send the id for the holiday and an array containing the ids of each participant.</p>
<p><b>Example: {
    "holiday" : 2,
    "participants" : [1, 3, 4, 8]
}</b></p>
<h4>api/updateHoliday/$</h4>
<p>This is the endpoint for updating any holiday you want. Just replace the '$' symbol for the id number of holiday required. For this to work you got to send any or all of the following data: title, location, date or description.</p>
