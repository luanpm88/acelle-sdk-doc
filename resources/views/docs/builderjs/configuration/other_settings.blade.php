<div id="{{ $resource['name'] }}" class="subsection">
    <h4 class="mb-4">{{ $resource['title'] }}</h4>
    <div class="row">
        <div class="col-md-7 pr-5">                        
            <p>Below is the complete list of configuration settings (optional) that can be passed to the Builder construction</p>

            <div class="mt-4">
                <h6>Construction Parameters</h6>

                <div class="mt-3">
                    @include('docs.api._attributes', [
                        'rows' => [
                            [
                                'name' => 'url',
                                'type' => 'string',
                                'desc' => 'URL of the template to be loaded. If not provided, BuildJS will load a blank design page',
                            ],
                            [
                                'name' => 'backUrl',
                                'type' => 'string',
                                'desc' => 'URL of the page that builder redirects to when Exit or Back button is clicked',
                            ],
                            [
                                'name' => 'templates',
                                'type' => 'string',
                                'desc' => 'List of templates available for user to choose from. See Templates section for details',
                            ],
                            [
                                'name' => 'title',
                                'type' => 'string',
                                'desc' => 'Title to set for the current HTML page, overwriting the <code>&lt;title&gt;</code> tag value',
                            ],
                            [
                                'name' => 'saveUrl',
                                'type' => 'string',
                                'desc' => 'The URL to which BuilderJS submits its latest content for storing (handled by server script). See Storage section for details',
                            ],
                            [
                                'name' => 'tags',
                                'type' => 'string',
                                'desc' => 'Tags used by the BuilderJS to represent a dynamic value. See Tags section for the details',
                            ],
                            [
                                'name' => 'view',
                                'type' => 'string',
                                'desc' => 'The parent element to which BuilderJS renders its content. It is <code>document.root</code> by default',
                            ],
                            [
                                'name' => 'disableFeatures',
                                'type' => 'string',
                                'desc' => 'List of feature names separated by commas. The features that are removed from BuilderJs.',
                                'attributes' => [
                                    [
                                        'name' => 'change_template',
                                        'desc' => 'Change template feature',
                                    ],
                                    [
                                        'name' => 'export',
                                        'desc' => 'Export button in the top right menu',
                                    ],
                                    [
                                        'name' => 'save_close',
                                        'desc' => 'Save & Close button',
                                    ],
                                    [
                                        'name' => 'footer_exit',
                                        'desc' => 'Exit link in the footer of builder',
                                    ],
                                    [
                                        'name' => 'help',
                                        'desc' => 'Help section in the top right menu',
                                    ],
                                ],
                            ],[
                                'name' => 'disableWidgets',
                                'type' => 'string',
                                'desc' => 'List of widget class names separated by commas. The widgets that are removed from BuilderJs.',
                                'attributes' => [
                                    [
                                        'name' => 'TextareaFieldWidget',
                                    ],
                                    [
                                        'name' => 'CheckboxFieldWidget',
                                    ],
                                    [
                                        'name' => 'MultiselectFieldWidget',
                                    ],
                                    [
                                        'name' => 'NumberFieldWidget',
                                    ],
                                    [
                                        'name' => 'SubmitButtonWidget',
                                    ],
                                    [
                                        'name' => 'IpFieldWidget',
                                    ],
                                    [
                                        'name' => 'RatingFieldWidget',
                                    ],
                                    [
                                        'name' => 'RadioFieldWidget',
                                    ],
                                    [
                                        'name' => 'DateFieldWidget',
                                    ],
                                    [
                                        'name' => 'DropdownFieldWidget',
                                    ],
                                    [
                                        'name' => 'EmailFieldWidget',
                                    ],
                                    [
                                        'name' => 'TextFieldWidget',
                                    ],
                                    [
                                        'name' => 'SocialLinksBlockWidget',
                                    ],
                                    [
                                        'name' => 'FooterBlockWidget',
                                    ],
                                    [
                                        'name' => 'TwoArticlesBlockWidget',
                                    ],
                                    [
                                        'name' => 'TwoArticlesRTLBlockWidget',
                                    ],
                                    [
                                        'name' => 'ThreeColumnsBlockWidget',
                                    ],
                                    [
                                        'name' => 'TwoColumnsBlockWidget',
                                    ],
                                    [
                                        'name' => 'OneColumnBlockWidget',
                                    ],
                                    [
                                        'name' => 'IntroBlockWidget',
                                    ],
                                    [
                                        'name' => 'HeroImageWidget',
                                    ],
                                    [
                                        'name' => 'HeaderBlockWidget',
                                    ],
                                    [
                                        'name' => 'OneRowWidget',
                                    ],
                                    [
                                        'name' => 'TwoRow48Widget',
                                    ],
                                    [
                                        'name' => 'TwoRow66Widget',
                                    ],
                                    [
                                        'name' => 'TwoRow84Widget',
                                    ],
                                    [
                                        'name' => 'ThreeRow444Widget',
                                    ],
                                    [
                                        'name' => 'FourRow3333Widget',
                                    ],
                                    [
                                        'name' => 'TextWidget',
                                    ],
                                    [
                                        'name' => 'BoxedTextWidget',
                                    ],
                                    [
                                        'name' => 'ImageWidget',
                                    ],
                                    [
                                        'name' => 'ButtonWidget',
                                    ],
                                    [
                                        'name' => 'DividerWidget',
                                    ],
                                    [
                                        'name' => 'SocialWidget',
                                    ],
                                    [
                                        'name' => 'HtmlWidget',
                                    ],
                                    [
                                        'name' => 'VideoWidget',
                                    ],
                                    [
                                        'name' => 'ImageCaptionWidget',
                                    ],
                                    [
                                        'name' => 'FooterWidget',
                                    ],
                                    [
                                        'name' => 'HeaderWidget',
                                    ],
                                    [
                                        'name' => 'TableWidget',
                                    ],
                                    [
                                        'name' => 'Table4Widget',
                                    ],
                                    [
                                        'name' => 'Table5Widget',
                                    ],
                                    [
                                        'name' => 'ListImageWidget',
                                    ],
                                    [
                                        'name' => 'ProgressBarWidget',
                                    ],
                                    [
                                        'name' => 'ListGroupWidget',
                                    ],
                                    [
                                        'name' => 'PanelWidget',
                                    ],
                                    [
                                        'name' => 'ImageHeaderWidget',
                                    ],
                                    [
                                        'name' => 'JumbotronWidget',
                                    ],
                                    [
                                        'name' => 'MeterialWidget',
                                    ],
                                    [
                                        'name' => 'NavbarWidget',
                                    ],
                                    [
                                        'name' => 'PricingTableWidget',
                                    ],
                                    [
                                        'name' => 'ServicesListWidget',
                                    ],
                                    [
                                        'name' => 'ImageGridWidget',
                                    ],
                                    [
                                        'name' => 'UserProfileWidget',
                                    ],
                                    [
                                        'name' => 'DivContainerWidget',
                                    ],
                                    [
                                        'name' => 'ContainerWidget',
                                    ],
                                    [
                                        'name' => 'WellWidget',
                                    ],
                                    [
                                        'name' => 'MediaObjectWidget',
                                    ],
                                    [
                                        'name' => 'ParagraphWidget',
                                    ],
                                    [
                                        'name' => 'MarkedTextWidget',
                                    ],
                                    [
                                        'name' => 'DefinitionListWidget',
                                    ],
                                    [
                                        'name' => 'BlockqouteWidget',
                                    ],
                                    [
                                        'name' => 'UnorderedListWidget',
                                    ],
                                    [
                                        'name' => 'HeadingWidget',
                                    ],
                                    [
                                        'name' => 'LinkWidget',
                                    ],
                                    [
                                        'name' => 'ButtonGroupWidget',
                                    ],
                                    [
                                        'name' => 'ButtonToolbarWidget',
                                    ],
                                    [
                                        'name' => 'InputFieldWidget',
                                    ],
                                    [
                                        'name' => 'TextAreaWidget',
                                    ],
                                    [
                                        'name' => 'CheckboxWidget',
                                    ],
                                    [
                                        'name' => 'InputGroupWidget',
                                    ],
                                    [
                                        'name' => 'FormGroupWidget',
                                    ],
                                    [
                                        'name' => 'SelectWidget',
                                    ],
                                    [
                                        'name' => 'FormWidget',
                                    ],
                                    [
                                        'name' => 'CustomWidget',
                                    ],
                                ],
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-5">                        
            
        </div>
    </div>
</div>