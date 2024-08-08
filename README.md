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
<p>The application URL represent the main entrance for your system.</p>
<p>DB_CONNECTION=your_DB/</p>
<p>Some options are: mysql, mariadb, pgsql, sqlite or sqlsrv</p>
<p>DB_HOST=IP address</p>
<p>DB_PORT=port number</p>
<p>DB_DATABASE=buzzvel</p>
<p>DB_USERNAME=username</p>
<p>DB_PASSWORD=your_password</p>

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

<h4>api/logup</h4>
<p>Here we sand the following data: name, email, password and password_confirmation</p>
<p>After sending the correct data to the API a message about the creation of a new user is send back to the client. On the other hand, if send missing data or wrong data a message will be returned about what went wrong.</p>
<h4>api/login</h4>
<p>Login is necessary to get your access token. Here you send your email address and your password.</p>
<p>After getting your token you have to save it and use it on the body of your future requisitions. For instance if you use JavaScript fetch you may set up the headers like following:</p>
<b>
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + your_token
    } 
</b>
<h4>api/logout</h4>
<p>Here you do not need to send anything. Just send an GET request and all your active tokens will be erased.</p>
<p></p>
<p></p>
