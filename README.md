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

{
    "key1" : "value1",
    "key2" : "value2",
    "key3" : "value3",
    .
    .
    .
}



<h3>api/logup</h3>

<p>Here we sand the following data: name, email, password and password_confirmation</p>

<p></p>
<p></p>
<p></p>
