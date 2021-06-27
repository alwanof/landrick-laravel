## How to intsall
<ol>
<li>
Copy middleware file(lang.php)  to app/Http/Middleware/ 
</li>
<li>
Add following line to middleware  kernal.php:
<br>
<pre>
protected $routeMiddleware = [
    ----------------------------------------------------------------
    ----------------------------------------------------------------
    "lang" => \App\Http\Middleware\Lang::class
];
</pre> 
</li>
<li>
Copy [web.php] content to [your web.php] file.
</li>
<li>
Copy [front] folder to your [public/].
</li>
<li>
Copy [json] folder to your [storage/].
</li>
<li>
Copy [template] folder to your [view/].
</li>
</ol>
