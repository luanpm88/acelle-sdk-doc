<div id="{{ $resource['name'] }}" class="subsection">
    <h2 class="mb-4">{{ $resource['title'] }}</h2>
    <div class="row pb-5">
        <div class="col-md-6">
            <p>When it comes to save, <strong>BuilderJS</strong> allows you to specify a Save URI, to which it will make a POST request, passing the latest updates to the server side scripting for handling. The request is triggered when user clicks on Save button in the builder.</p>

            <p>Actual job of storing the submitted content is handled by a server-side scripting language like PHP, Ruby, Python, Java, .Net, etc.</p>

            <p>Below is an example of how BuilderJS sends its content to the server. By default, when user clicks Save button, BuilderJS makes a <code>POST</code> request to the URL specified by <code>saveUrl</code> parameter passed to the builder construction method.</p>

            <p>See sample code on the right panel, <code>javascript</code> tab to see how to specify a save URL mentioned above. See <code>php</code> or <code>ruby</code> or <code>python</code> tabs for sample code snippet that handles such request.</p>
        </div>
        
        <div class="col-md-6">                        
            <div class="sticky two-blocks">
                @include('docs.builderjs._html', [
                    'title' => 'JS',
                    'lines' => 9,
                    'html' => '// Initiate builder with &#x60;saveUrl&#x60;
// See &#x60;php&#x60; or &#x60;ruby&#x60; tab to see how to
// handle save request sent from builder in PHP and Ruby respectively
var builder = new Editor({
    root: &#x27;/project/dist/&#x27;,
    url: &#x27;http://example.com/template/02093403&#x27;,
    saveUrl: &#x27;http://example.com/save?id=02093403&#x27;,
    saveMethod: &#x27;POST&#x27;
});',
                ])

                @include('docs.builderjs._code', [
                    'title' => 'PHP',
                    'curl' => [
                        'uri' => 'lists',
                        'method' => 'GET',
                        'params' => [
                            ['name' => 'api_token', 'value' => '*|token_string|*'],
                        ],
                    ],
                    'php' => [
                        'function' => "list()->all()",
                        'lines' => 29,
                        'content' => '&#x3C;?php

// Sample controller code for handling the save request
// sent from BuilderJS

// MySQL credentials
$servername = &#x22;localhost&#x22;;
$username = &#x22;user&#x22;;
$password = &#x22;password&#x22;;
$dbname = &#x22;myDB&#x22;;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve parameters passed to the server script
$html = $_POST[&#x27;content&#x27;];
$html = $conn-&#x3E;real_escape_string($html);
$templateId = $_GET[&#x27;id&#x27;];

// Actually update the MySQL database
$sql = &#x22;UPDATE templates SET content = &#x27;{$html}&#x27;
        WHERE id = &#x27;{$templateId}&#x27;&#x22;;

if ($conn-&#x3E;query($sql) === TRUE) {
    echo &#x22;Template updated successfully&#x22;;
}

$conn-&#x3E;close();',
                    ],
                    'html' => [
                        'content' => '&#x3C;?php

// Sample controller code for handling the save request
// sent from BuilderJS

// MySQL credentials
$servername = &#x22;localhost&#x22;;
$username = &#x22;user&#x22;;
$password = &#x22;password&#x22;;
$dbname = &#x22;myDB&#x22;;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve parameters passed to the server script
$html = $_POST[&#x27;content&#x27;];
$html = $conn-&#x3E;real_escape_string($html);
$templateId = $_GET[&#x27;id&#x27;];

// Actually update the MySQL database
$sql = &#x22;UPDATE templates SET content = &#x27;{$html}&#x27;
        WHERE id = &#x27;{$templateId}&#x27;&#x22;;

if ($conn-&#x3E;query($sql) === TRUE) {
    echo &#x22;Template updated successfully&#x22;;
}

$conn-&#x3E;close();',
                        'lines' => 29,
                    ],
                ])
            </div>
        </div>
    </div>

    @if (isset($resource['children']))
        @foreach ($resource['children'] as $resource2)
            {!! $resource2['content'] !!}
        @endforeach
    @endif  
</div>