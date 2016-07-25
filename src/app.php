<?php

use Silex\Application;
use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\ServicesLoader;
use App\RoutesLoader;
use Carbon\Carbon;

date_default_timezone_set('Europe/Paris');

define("ROOT_PATH", __DIR__ . "/..");








//handling CORS preflight request
$app->before(function (Request $request) {
   if ($request->getMethod() === "OPTIONS") {
       $response = new Response();
       $response->headers->set("Access-Control-Allow-Origin","*");
       $response->headers->set("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
       $response->headers->set("Access-Control-Allow-Headers","Content-Type");
       $response->setStatusCode(200);
       return $response->send();
   }
}, Application::EARLY_EVENT);



//handling CORS respons with right headers
$app->after(function (Request $request, Response $response) {
   $response->headers->set("Access-Control-Allow-Origin","*");
   $response->headers->set("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
});

//accepting JSON
$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});





$app->register(new Gigablah\Silex\OAuth\OAuthServiceProvider(), array(
    'oauth.services' => array(
        'Facebook' => array(
            'key' => FACEBOOK_API_KEY,
            'secret' => FACEBOOK_API_SECRET,
            'scope' => array('email'),
            'user_endpoint' => 'https://graph.facebook.com/me'
        ),
        'Twitter' => array(
            'key' => TWITTER_API_KEY,
            'secret' => TWITTER_API_SECRET,
            'scope' => array(),
            // Note: permission needs to be obtained from Twitter to use the include_email parameter
            'user_endpoint' => 'https://api.twitter.com/1.1/account/verify_credentials.json?include_email=true',
            'user_callback' => function ($token, $userInfo, $service) {
                $token->setUser($userInfo['name']);
                $token->setEmail($userInfo['email']);
                $token->setUid($userInfo['id']);
            }
        ),
        'Google' => array(
            'key' => GOOGLE_API_KEY,
            'secret' => GOOGLE_API_SECRET,
            'scope' => array(
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile'
            ),
            'user_endpoint' => 'https://www.googleapis.com/oauth2/v1/userinfo'
        ),
        'GitHub' => array(
            'key' => GITHUB_API_KEY,
            'secret' => GITHUB_API_SECRET,
            'scope' => array('user:email'),
            'user_endpoint' => 'https://api.github.com/user'
        )
    )
));




$app->register(new ServiceControllerServiceProvider());




$app->register(new DoctrineServiceProvider(), array(
  "db.options" => $app["db.options"]
));


$app->register(new HttpCacheServiceProvider(), array("http_cache.cache_dir" => ROOT_PATH . "/storage/cache",));

$app->register(new MonologServiceProvider(), array(
    "monolog.logfile" => ROOT_PATH . "/storage/logs/" . Carbon::now('Europe/Paris')->format("Y-m-d") . ".log",
    "monolog.level" => $app["log.level"],
    "monolog.name" => "application"
));


//load services
$servicesLoader = new App\ServicesLoader($app);
$servicesLoader->bindServicesIntoContainer();


//load routes
$routesLoader = new App\RoutesLoader($app);
$routesLoader->bindRoutesToControllers();


$app->error(function (\Exception $e, $code) use ($app) {
    $app['monolog']->addError($e->getMessage());
    $app['monolog']->addError($e->getTraceAsString());
    return new JsonResponse(array("statusCode" => $code, "message" => $e->getMessage(), "stacktrace" => $e->getTraceAsString()));
});

return $app;
