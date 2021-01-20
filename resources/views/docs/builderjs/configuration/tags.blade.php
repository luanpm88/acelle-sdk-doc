<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-7 pr-5">                        
            <p>Tag is a powerful feature of BuildJS, allowing users to inject dynamic content to page or email content. For example, very often user wants to inject a dynamic contact first name or last name to an email template. Dynamic content can be achieved by inserting a place holder, or, in other word, a tag to your email or page content. When it comes to load your page or send your email, tags will be translated to appropriate values. Example of tags are:</p>

            <ul>
            <li>{CONTACT_FIRST_NAME}</li>
            <li>{CONTACT_LAST_NAME}</li>
            <li>{PRODUC_TITLE}</li>
            <li>{PRODUC_PRICE}</li>
            <li>{PRODUC_DESCRIPTION}</li>
            <li>{ORDER_NUMBER}</li>
            <li>{ORDER_VOLUME}</li>
            <li>{ORDER_AMOUNT}</li>
            </ul>

            <p>Other examples of constant tags</p>

            <ul>
            <li>{CURRENT_DATE}</li>
            <li>{CURRENT_TIME}</li>
            </ul>

            <p>You can define your own list of tags and pass those to the <code>tags</code> parameter of BuilderJS construction. BuilderJS has a very powerful feature allowing you to drag and drop a tag to your template content page, without you having to manually type in the tag. Even more, you can benefit from tag autocomplete feature. That is, just type an open bracket and BuilderJS will render a autocomplete dropdown list of all available tags for you</p>

            <p>That&#39;s how BuilderJS helps with tag editing, making it easy for user to add tags to email or page content.</p>
        </div>
        <div class="col-md-5">                        
            
        </div>
    </div>
</div>