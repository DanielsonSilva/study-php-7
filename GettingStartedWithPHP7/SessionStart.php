<?php 

session_start([
	'use_cookies' => 0
]);

?>
<html>
<title>Testing Session Start Options in PHP 7</title>
<body>

In the new version of PHP 7, the <b>session_start</b> function has options to be set. One example is the option <i>use_cookies</i> to disable the use of cookies by default.<br>
Here is the list of the options found in <a href="http://php.net/manual/en/session.configuration.php" target="_blank">Session Manual Configuration</a>:<br>
<br>
<ul>
<li>session.save_path -> <b>Default:</b> "" -> <b>Description:</b> Path to save anything related to the session.<br></li> 	 
<li>session.name -> <b>Default:</b> "PHPSESSID" -> <b>Description:</b> Session name that is used as the cookie name.<br></li>
<li>session.save_handler -> <b>Default:</b> "files" -> <b>Description:</b> Defines the name of the handler which is used for storing and retrieving data associated with a session.<br></li>
<li>session.auto_start -> <b>Default:</b> "0" -> <b>Description:</b> Specifies whether the session module starts a session automatically on request startup.<br></li>
<li>session.gc_probability -> <b>Default:</b> "1" -> <b>Description:</b> In conjunction with session.gc_divisor is used to manage probability that the gc (garbage collection) routine is started.<br></li>
<li>session.gc_divisor -> <b>Default:</b> "100" -> <b>Description:</b> Coupled with session.gc_probability defines the probability that the gc (garbage collection) process is started on every session initialization. The probability is calculated by using gc_probability/gc_divisor, e.g. 1/100 means there is a 1% chance that the GC process starts on each request.<br></li>
<li>session.gc_maxlifetime -> <b>Default:</b> "1440" -> <b>Description:</b> Specifies the number of seconds after which data will be seen as 'garbage' and potentially cleaned up.<br></li>
<li>session.serialize_handler -> <b>Default:</b> "php" -> <b>Description:</b> Defines the name of the handler which is used to serialize/deserialize data.<br></li>
<li>session.cookie_lifetime -> <b>Default:</b> "0" -> <b>Description:</b> Specifies the lifetime of the cookie in seconds which is sent to the browser. The value 0 means "until the browser is closed".<br></li>
<li>session.cookie_path -> <b>Default:</b> "/" -> <b>Description:</b> Specifies path to set in the session cookie.<br></li> 
<li>session.cookie_domain -> <b>Default:</b> "" -> <b>Description:</b> Specifies the domain to set in the session cookie. Default is none at all meaning the host name of the server which generated the cookie according to cookies specification.<br></li>
<li>session.cookie_secure -> <b>Default:</b> "" -> <b>Description:</b> Specifies whether cookies should only be sent over secure connections.<br></li>
<li>session.cookie_httponly -> <b>Default:</b> "" -> <b>Description:</b> Marks the cookie as accessible only through the HTTP protocol. This means that the cookie won't be accessible by scripting languages, such as JavaScript. This setting can effectively help to reduce identity theft through XSS attacks.<br></li></li>
<li>session.use_strict_mode -> <b>Default:</b> "0" -> <b>Description:</b> Specifies whether the module will use strict session id mode. If this mode is enabled, the module does not accept uninitialized session ID. If uninitialized session ID is sent from browser, new session ID is sent to browser. Applications are protected from session fixation via session adoption with strict mode.<br></li>
<li>session.use_cookies -> <b>Default:</b> "1" -> <b>Description:</b> Specifies whether the module will use cookies to store the session id on the client side.<br></li>
<li>session.use_only_cookies -> <b>Default:</b> "1" -> <b>Description:</b> Specifies whether the module will only use cookies to store the session id on the client side. Enabling this setting prevents attacks involved passing session ids in URLs.<br></li>
<li>session.referer_check -> <b>Default:</b> "" -> <b>Description:</b> Contains the substring you want to check each HTTP Referer for.<br></li>
<li>session.cache_limiter -> <b>Default:</b> "nocache" -> <b>Description:</b> specifies the cache control method used for session pages. It may be one of the following values: <i>nocache</i>, <i>private</i>, <i>private_no_expire</i>, or <i>public</i>.<br></li>
<li>session.cache_expire -> <b>Default:</b> "180" -> <b>Description:</b> Specifies time-to-live for cached session pages in minutes, this has no effect for nocache limiter.<br></li>
<li>session.use_trans_sid -> <b>Default:</b> "0" -> <b>Description:</b> Whether transparent sid support is enabled or not.<br></li>
<li>session.trans_sid_tags -> <b>Default:</b> "a=href,area=href,frame=src,form=" -> <b>Description:</b> Specifies which HTML tags are rewritten to include session id when transparent sid support is enabled.<br></li>
<li>session.trans_sid_hosts -> <b>Default:</b> $_SERVER['HTTP_HOST'] -> <b>Description:</b> Specifies which hosts are rewritten to include session id when transparent sid support is enabled.<br></li>
<li>session.sid_length -> <b>Default:</b> "32" -> <b>Description:</b> Allows you to specify the length of session ID string. Session ID length can be between 22 to 256.<br></li>
<li>session.sid_bits_per_character -> <b>Default:</b> "5" -> <b>Description:</b> Allows you to specify the number of bits in encoded session ID character. The possible values are '4' (0-9, a-f), '5' (0-9, a-v), and '6' (0-9, a-z, A-Z, "-", ",").<br></li>
<li>session.upload_progress.enabled -> <b>Default:</b> "1" -> <b>Description:</b> Enables upload progress tracking, populating the $_SESSION variable.<br></li>
<li>session.upload_progress.cleanup -> <b>Default:</b> "1" -> <b>Description:</b> Cleanup the progress information as soon as all POST data has been read.<br></li>
<li>session.upload_progress.prefix -> <b>Default:</b> "upload_progress_" -> <b>Description:</b> A prefix used for the upload progress key in the $_SESSION. This key will be concatenated with the value of $_POST[ini_get("session.upload_progress.name")] to provide a unique index.<br></li>
<li>session.upload_progress.name -> <b>Default:</b> "PHP_SESSION_UPLOAD_PROGRESS" -> <b>Description:</b> The name of the key to be used in $_SESSION storing the progress information. See also session.upload_progress.prefix. If $_POST[ini_get("session.upload_progress.name")] is not passed or available, upload progressing will not be recorded.<br></li>
<li>session.upload_progress.freq -> <b>Default:</b> "1%" -> <b>Description:</b> Defines how often the upload progress information should be updated.<br></li>
<li>session.upload_progress.min_freq -> <b>Default:</b> "1" -> <b>Description:</b> The minimum delay between updates, in seconds.<br></li>
<li>session.lazy_write -> <b>Default:</b> "1" -> <b>Description:</b> When set to 1, means that session data is only rewritten if it changes.<br></li>
<li>url_rewriter.tags -> <b>Default:</b> "a=href,area=href,frame=src,form=" -> <b>Description:</b> Specifies which HTML tags are rewritten by output_add_rewrite_var() values.<br></li>
<li>session.hash_function -> <b>Default:</b> "0" -> <b>Description:</b> Allows you to specify the hash algorithm used to generate the session IDs.<br></li>
<li>session.hash_bits_per_character -> <b>Default:</b> "4" -> <b>Description:</b> Allows you to define how many bits are stored in each character when converting the binary hash data to something readable. The possible values are '4' (0-9, a-f), '5' (0-9, a-v), and '6' (0-9, a-z, A-Z, "-", ",").<br></li>
<li>session.entropy_file -> <b>Default:</b> "" -> <b>Description:</b> Gives a path to an external resource (file) which will be used as an additional entropy source in the session id creation process.<br></li>
<li>session.entropy_length -> <b>Default:</b> "0" -> <b>Description:</b> Specifies the number of bytes which will be read from the file specified above.<br></li>
<li>session.bug_compat_42 -> <b>Default:</b> "1" -> <b>Description:</b> PHP versions 4.2.3 and lower have an undocumented feature/bug that allows you to initialize a session variable in the global scope, albeit register_globals is disabled. PHP 4.3.0 and later will warn you, if this feature is used, and if session.bug_compat_warn is also enabled. This feature/bug can be disabled by disabling this directive.<br></li>
<li>session.bug_compat_warn -> <b>Default:</b> "1" -> <b>Description:</b> PHP versions 4.2.3 and lower have an undocumented feature/bug that allows you to initialize a session variable in the global scope, albeit register_globals is disabled. PHP 4.3.0 and later will warn you, if this feature is used by enabling both session.bug_compat_42 and session.bug_compat_warn.<br></li>
</ul>
</body>
</html>