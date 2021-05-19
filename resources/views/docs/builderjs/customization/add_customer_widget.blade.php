<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-4 pr-5">                        
            <p class="mb-4">This is a sample widget so that you can explore how to add a custom widget to BuilderJS</p>
            <img src="{{ url('image/custom-widget.png') }}" width="100%" />
        </div>
        <div class="col-md-8">                        
            <div class="sticky two-blocks">
                <p>Add js Widget Class below, before <code>Editor.init(…)</code> line:</p>
                <div class="code-box dark-theme">
                    <div class="box-header">
                        <div class="box-title">HTML</div>
                        <div title="Click to Change" style="height: 26px;
                        display: flex;
                        align-items: center;" class="xtooltip box-tab ml-auto">
                            <select class="lang-switch curl">
                                <option value="curl" selected>JS</option>
                                {{-- <option value="php">HTML</option> --}}
                            </select>
                            <select class="lang-switch php">
                                <option value="curl">JS</option>
                                {{-- <option value="php" selected>HTML</option> --}}
                            </select>
                        </div>
                        <div title="Copy to Clipboard" class="xtooltip box-copy">
                            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--clipboard-svg SVG--color-svg SVG--color--blue200-svg" style="width: 16px;height: 16px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 5h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2 3 3 0 0 0 3 3zM6 2a2 2 0 1 1 4 0 1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z" fill-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="lang-switchx php">
                        <div class="code-blocks d-flex align-items-top">
                            <div class="line-numbers">
                                @for ($i=1; $i <= 10; $i++)
                                    <span>{{ $i }}</span>
                                @endfor
                            </div>
                            <pre class="IntroSection-pre highlight js tab-html"><code style="width:780px">// custom button widget
class CustomButtonWidget extends Widget {
    getHtmlId() {
        return "CustomButtonWidget";
    }

    name() {
        return getI18n('custom_button');
    }
}</code></pre>
                        </div>
                    </div>
                </div>
                <p class="mb-1"> <code class="display-inline">getHtmlId()</code>: return id of widget</p>
                <p class=""> <code class="display-inline">name()</code>: return name of the widget that show in BuilderJS</p>

                <p>Insert widget button/content by overwriting widget <code class="display-inline">init()</code> function:</p>

                <div class="code-box dark-theme">
                    <div class="box-header">
                        <div class="box-title">HTML</div>
                        <div title="Click to Change" style="height: 26px;
                        display: flex;
                        align-items: center;" class="xtooltip box-tab ml-auto">
                            <select class="lang-switch curl">
                                <option value="curl" selected>JS</option>
                                {{-- <option value="php">HTML</option> --}}
                            </select>
                            <select class="lang-switch php">
                                <option value="curl">JS</option>
                                {{-- <option value="php" selected>HTML</option> --}}
                            </select>
                        </div>
                        <div title="Copy to Clipboard" class="xtooltip box-copy">
                            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--clipboard-svg SVG--color-svg SVG--color--blue200-svg" style="width: 16px;height: 16px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 5h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2 3 3 0 0 0 3 3zM6 2a2 2 0 1 1 4 0 1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z" fill-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="lang-switchx php">
                        <div class="code-blocks d-flex align-items-top">
                            <div class="line-numbers">
                                @for ($i=1; $i <= 32; $i++)
                                    <span>{{ $i }}</span>
                                @endfor
                            </div>
                            <pre class="IntroSection-pre highlight js tab-html"><code style="width:930px">class CustomButtonWidget extends Widget {
    .....
    init() {
        // default button html
        this.setButtonHtml(`
            &lt;div class=&quot;_1content widget-button&quot;&gt;
                &lt;div class=&quot;panel__body&quot; title=&quot;{language.wpanel.widgets.title.title}&quot;&gt;
                    &lt;div class=&quot;image-drag&quot;&gt;
                        &lt;div class=&quot;ng-binding&quot;&gt;
                            &lt;i class=&quot;material-icons-outlined&quot; style=&quot;font-size: 36px; display: inline-block;&quot;&gt;crop_16_9&lt;/i&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                    &lt;div class=&quot;body__title body__title--cs ng-binding&quot;&gt;Custom Button&lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        `);

        // default content html
        this.setContentHtml(`
            &lt;div builder-element=&quot;BlockElement&quot; builder-draggable class=&quot;px-3 my-3&quot;&gt;
                &lt;div class=&quot;text-center&quot;&gt;
                    &lt;button builder-element builder-inline-edit class=&quot;btn btn-primary btn-lg mr-2&quot;&gt;
                        Button Name Here
                    &lt;/button&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        `);

        // default dragging html
        this.setDraggingHtml(this.getButtonHtml());
    }
}</code></pre>
                        </div>
                    </div>
                </div>

                <p class="mb-1"> <code class="display-inline">setButtonHtml()</code>: HTML content of widget button in the widgets list panel</p>
                <p class="mb-1"> <code class="display-inline">setContentHtml()</code>: HTML content when widget dropped in content of template</p>
                <p class=""> <code class="display-inline">setDraggingHtml()</code>: HTML content that following the cursor when dragging the widget</p>

                <p>In <code class="display-inline">Editor.init()</code> scope, add this attribute to init hash:</p>

                <div class="code-box dark-theme">
                    <div class="box-header">
                        <div class="box-title">HTML</div>
                        <div title="Click to Change" style="height: 26px;
                        display: flex;
                        align-items: center;" class="xtooltip box-tab ml-auto">
                            <select class="lang-switch curl">
                                <option value="curl" selected>JS</option>
                                {{-- <option value="php">HTML</option> --}}
                            </select>
                            <select class="lang-switch php">
                                <option value="curl">JS</option>
                                {{-- <option value="php" selected>HTML</option> --}}
                            </select>
                        </div>
                        <div title="Copy to Clipboard" class="xtooltip box-copy">
                            <svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--clipboard-svg SVG--color-svg SVG--color--blue200-svg" style="width: 16px;height: 16px;" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg"><path d="M7 5h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2 3 3 0 0 0 3 3zM6 2a2 2 0 1 1 4 0 1 1 0 0 1-1 1H7a1 1 0 0 1-1-1z" fill-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="lang-switchx php">
                        <div class="code-blocks d-flex align-items-top">
                            <div class="line-numbers">
                                @for ($i=1; $i <= 4; $i++)
                                    <span>{{ $i }}</span>
                                @endfor
                            </div>
                            <pre class="IntroSection-pre highlight js tab-html"><code style="width:930px">var editor = new Editor({
    ...
    loaded: function() {
        this.addContentWidget(new CustomButtonWidget(), 0, ‘Custom Widgets’);</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>