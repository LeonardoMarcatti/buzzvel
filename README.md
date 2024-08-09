<p></p>
<h2></h2>
<h3></h3>
<h1>Introduction</h1>
<p>The following instrictions provides explanations about how to use this API by describing how to setup everything that is necessary to use it. </p>
<p>The building of this API is part of a Buzzvel challenge to find an candidate for joining its team.</p>
<p>Once you have cloned the project to your system you have to open an Terminal on the folder your project is located and run <b>composer install.</b> This will install the project as well as all depencencies it requires.</p>

<h2>Setup Your System</h2>
<h3>Intro</h3>
<p>It is necessary to make some ajustments on your .env file located inside the project folder. There you must setup some parameters in order this project to run smoothly.</p>
<p>First of all, it is important to have an data bank user with permissions to manage buzzvel bank actions like, create, read, update and delete.</p>
<p>APP_URL=ip_address/path_to_folder/buzzvel/public/</p>
<p>The application URL represent the main entrance for your system.</p>
<p>DB_CONNECTION=your_DB/</p>
<p>Some options are: mysql, mariadb, pgsql, sqlite or sqlsrv</p>
<p>DB_HOST=IP address</p>
<p>DB_PORT=port number</p>
<p>DB_DATABASE=buzzvel</p>
<p>DB_USERNAME=username</p>
<p>DB_PASSWORD=your_password</p>

<h2>Data Bank</h2>
<h3>Intro</h3>
<p>The data bank was build with only three tables - holiday, participants and holidays_participants. The reason behind this is to allow more felxibiliy when it comes to creation of participants as well as holidays.</p>
<h2>Holiday Table</h2>
<p>It contains information about holidays. The most inportante ones are: id, title, descriiption, location, and date. All of them are string type except for td and date.</p>
<h2>Participants Table</h2>
<p>It holds information about people who will participate on holidays trips. Here the most important information are id(integer) and name(string).</p>
<h2>Holidays_Participatns Table</h2>
<p>This table connects both Holiday and participants table together. Since a holiday may have many participants and a participant may be present in more then one holiday trip this table is a must.</p>
<p>It contains the ids for holidays and participants that are necessary to connect both tables.</p>
<h2>Endpoints</h2>
<h3>Intro</h3>
<p>For some endpoints it is necessary to send some data in order to get what is wanted. It is the case of POST method endpoints like login, logup, getPlan, getAllPlans, getPFD, addParticipant and PUT method like updatePlan or updateparticipant</p>
<p>The data that mus be send to API must follow JSON format key/value inside curly braces like in the example above</p>
<b>
{
    "key1" : "value1",
    "key2" : "value2",
    "key3" : "value3",
    .
    .
    .
}
</b>
<p>When using API testing programs like Postman or Insomnia it is necessary to ajust some headers parameters in order Laravel to understand that the client is an API client. It is requred to set Accept and Content-Type to application/json</p>

<h4>api/logup</h4>
<p>Here we sand the following data: name, email, password and password_confirmation</p>
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
<p></p>
<p></p>
