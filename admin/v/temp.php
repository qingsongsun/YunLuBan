<link href="public/css/default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="public/css/blue.css" rel="stylesheet" type="text/css" media="screen" /> <!-- color skin: blue / red / green / dark -->
<link href="public/css/datePicker.css" rel="stylesheet" type="text/css" media="screen" />
<link href="public/css/wysiwyg.css" rel="stylesheet" type="text/css" media="screen" />
<link href="public/css/fancybox-1.3.1.css" rel="stylesheet" type="text/css" media="screen" />
<link href="public/css/visualize.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script>   
<script type="text/javascript" src="public/js/jquery.dimensions.min.js"></script>

<!-- // Tabs // -->
<script type="text/javascript" src="public/js/ui.core.js"></script>
<script type="text/javascript" src="public/js/jquery.ui.tabs.min.js"></script>

<!-- // Table drag and drop rows // -->
<script type="text/javascript" src="public/js/tablednd.js"></script>

<!-- // Date Picker // -->
<script type="text/javascript" src="public/js/date.js"></script>
<!--[if IE]><script type="text/javascript" src="public/js/jquery.bgiframe.js"></script><![endif]-->
<script type="text/javascript" src="public/js/jquery.datePicker.js"></script>

<!-- // Wysiwyg // -->
<script type="text/javascript" src="public/js/jquery.wysiwyg.js"></script>

<!-- // Graphs // -->
<script type="text/javascript" src="public/js/excanvas.js"></script>
<script type="text/javascript" src="public/js/jquery.visualize.js"></script>

<!-- // Fancybox // -->
<script type="text/javascript" src="public/js/jquery.fancybox-1.3.1.js"></script>

<!-- // File upload // --> 
<script type="text/javascript" src="public/js/jquery.filestyle.js"></script>

<script type="text/javascript" src="public/js/init.js"></script>

<body>
<div id="content2">

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <ul>
            <li class="home"><a href="">Homepage</a></li>
            <li><a href="">Category</a></li>
            <li>Page</li>
        </ul>
    </div>
    <!-- /breadcrumbs -->

    <!-- box -->
    <div id="tabs-statistic" class="box">
        <ul class="bookmarks">
            <li><a href="#tabs-line">Graphs line</a></li>
            <li><a href="#tabs-bar">Graphs bar</a></li>
            <li><a href="#tabs-pie">Graphs pie</a></li>
        </ul>
        <div class="box-content">    

            <div id="tabs-line">  
                <table class="chart none" id="line">
                    <thead>
                        <tr>
                            <td></td>
                            <th scope="col">Jan</th>
                            <th scope="col">Feb</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Apr</th>
                            <th scope="col">May</th>
                            <th scope="col">Jun</th>
                            <th scope="col">Jul</th>
                            <th scope="col">Aug</th>
                            <th scope="col">Sep</th>
                            <th scope="col">Oct</th>
                            <th scope="col">Nov</th>
                            <th scope="col">Dec</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">visitors</th>
                            <td>300</td>
                            <td>520</td>
                            <td>612</td>
                            <td>727</td>
                            <td>622</td>
                            <td>553</td>
                            <td>500</td>
                            <td>410</td>
                            <td>860</td>
                            <td>811</td>
                            <td>842</td>
                            <td>305</td>
                        </tr>
                        <tr>
                            <th scope="row">unique visitors</th>
                            <td>130</td>
                            <td>151</td>
                            <td>223</td>
                            <td>312</td>
                            <td>320</td>
                            <td>410</td>
                            <td>410</td>
                            <td>550</td>
                            <td>350</td>
                            <td>330</td>
                            <td>585</td>
                            <td>280</td>
                        </tr>	
                    </tbody>
                </table>	
            </div>

            <div id="tabs-bar">  
                <table class="chart none" id="bar">
                    <thead>
                        <tr>
                            <td></td>
                            <th scope="col">Jan</th>
                            <th scope="col">Feb</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Apr</th>
                            <th scope="col">May</th>
                            <th scope="col">Jun</th>
                            <th scope="col">Jul</th>
                            <th scope="col">Aug</th>
                            <th scope="col">Sep</th>
                            <th scope="col">Oct</th>
                            <th scope="col">Nov</th>
                            <th scope="col">Dec</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">visitors</th>
                            <td>300</td>
                            <td>520</td>
                            <td>612</td>
                            <td>727</td>
                            <td>622</td>
                            <td>553</td>
                            <td>500</td>
                            <td>410</td>
                            <td>860</td>
                            <td>811</td>
                            <td>842</td>
                            <td>305</td>
                        </tr>
                        <tr>
                            <th scope="row">unique visitors</th>
                            <td>130</td>
                            <td>151</td>
                            <td>223</td>
                            <td>312</td>
                            <td>320</td>
                            <td>410</td>
                            <td>410</td>
                            <td>550</td>
                            <td>350</td>
                            <td>330</td>
                            <td>585</td>
                            <td>280</td>
                        </tr>
                    </tbody>
                </table>	
            </div>

            <div id="tabs-pie">  
                <table class="chart none" id="pie">
                    <thead>
                        <tr>
                            <td></td>
                            <th scope="col">Jan</th>
                            <th scope="col">Feb</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Apr</th>
                            <th scope="col">May</th>
                            <th scope="col">Jun</th>
                            <th scope="col">Jul</th>
                            <th scope="col">Aug</th>
                            <th scope="col">Sep</th>
                            <th scope="col">Oct</th>
                            <th scope="col">Nov</th>
                            <th scope="col">Dec</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">visitors</th>
                            <td>300</td>
                            <td>520</td>
                            <td>612</td>
                            <td>727</td>
                            <td>622</td>
                            <td>553</td>
                            <td>500</td>
                            <td>410</td>
                            <td>860</td>
                            <td>811</td>
                            <td>842</td>
                            <td>305</td>
                        </tr>
                        <tr>
                            <th scope="row">unique visitors</th>
                            <td>130</td>
                            <td>151</td>
                            <td>223</td>
                            <td>312</td>
                            <td>320</td>
                            <td>410</td>
                            <td>410</td>
                            <td>550</td>
                            <td>350</td>
                            <td>330</td>
                            <td>585</td>
                            <td>280</td>
                        </tr>	
                    </tbody>
                </table>
            </div>

        </div><!-- box-content --> 
    </div>
    <!-- /box -->


    <!-- box -->
    <div class="box">
        <div class="headlines">
            <h2><span>Table list</span></h2>
            <a href="#" class="show-filter">show filter</a>
        </div>
        <!-- filter -->
        <div class="filter">
            <input type="text" value="column one" title="column one" class="input" />
            <input type="text" value="column two" title="column two" class="input" />
            <input type="text" value="column three" title="column three" class="input" />
            <input type="submit" value="Use filter" class="submit" />
        </div>
        <!-- /filter -->

        <!-- table -->
        <table class="tab tab-drag">
            <tr class="top nodrop nodrag">
                <th class="dragHandle">&nbsp;</th>
                <th class="checkbox"><input type="checkbox" name="" value="" class="check-all" /></th>
                <th>Column 1</th>
                <th>Column 2</th>          
                <th>Column 3</th>
                <th class="action">Action</th>
            </tr>
            <tr>
                <td class="dragHandle">&nbsp;</td>
                <td class="checkbox"><input type="checkbox" name="" value="" /></td>
                <td><a href="#">Table data one</a></td>
                <td>Table data one</td>          
                <td>Table data one</td>
                <td class="action">
                    <a href="" class="ico ico-delete">Delete</a>
                    <a href="" class="ico ico-edit">Edit</a>
                </td>
            </tr>
            <tr>
                <td class="dragHandle">&nbsp;</td>
                <td class="checkbox"><input type="checkbox" name="" value="" /></td>
                <td><a href="#">Table data two</a></td>
                <td>Table data two</td>          
                <td>Table data two</td>
                <td class="action">
                    <a href="" class="ico ico-delete">Delete</a>
                    <a href="" class="ico ico-edit">Edit</a>
                </td>
            </tr>
            <tr>
                <td class="dragHandle">&nbsp;</td>
                <td class="checkbox"><input type="checkbox" name="" value="" /></td>
                <td><a href="#">Table data three</a></td>
                <td>Table data three</td>          
                <td>Table data three</td>
                <td class="action">
                    <a href="" class="ico ico-delete">Delete</a>
                    <a href="" class="ico ico-edit">Edit</a>
                </td>
            </tr>
            <tr>
                <td class="dragHandle">&nbsp;</td>
                <td class="checkbox"><input type="checkbox" name="" value="" /></td>
                <td><a href="#">Table data four</a></td>
                <td>Table data four</td>          
                <td>Table data four</td>
                <td class="action">
                    <a href="" class="ico ico-delete">Delete</a>
                    <a href="" class="ico ico-edit">Edit</a>
                </td>
            </tr>
            <tr>
                <td class="dragHandle">&nbsp;</td>
                <td class="checkbox"><input type="checkbox" name="" value="" /></td>
                <td><a href="#">Table data five</a></td>
                <td>Table data five</td>          
                <td>Table data five</td>
                <td class="action">
                    <a href="" class="ico ico-delete">Delete</a>
                    <a href="" class="ico ico-edit">Edit</a>
                </td>
            </tr>
        </table>
        <!-- /table -->

        <!-- box-action -->  
        <div class="tab-action">
            <select class="select">
                <option>Choose an action</option>
            </select>
            <input type="submit" value="Apply action" class="submit" />
        </div>
        <!-- /box-action -->

        <!-- /pagination -->
        <div class="pagination">
            <ul>
                <li class="graphic first"><a href=""></a></li>
                <li class="graphic prev"><a href=""></a></li>
                <li><a href="">1</a></li>
                <li class="active"><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li class="graphic next"><a href=""></a></li>
                <li class="graphic last"><a href=""></a></li>
            </ul>
            <p>Pages 1 of 5</p>
        </div>
        <!-- /pagination --> 
    </div>
    <!-- /box -->

    <!-- /box -->
    <div class="box">
        <div class="headlines">
            <h2><span>Form</span></h2>
            <a href="#help" class="help"></a>
        </div>
        <div class="box-content">
            <form class="formBox" method="post" action="">
                <fieldset>

                    <!-- Correct form message -->
                    <div class="form-message correct">
                        <p>On the page the following error occurred:</p>
                        <ul>
                            <li>The name field is required</li>
                            <li>The email field is required</li>
                        </ul>
                    </div>

                    <!-- Warning form message -->            
                    <div class="form-message warning">
                        <p>On the page the following error occurred:</p>
                        <ul>
                            <li>The name field is required</li>
                            <li>The email field is required</li>
                        </ul>
                    </div>

                    <!-- Error form message -->            
                    <div class="form-message error">
                        <p>On the page the following error occurred:</p>
                        <ul>
                            <li>The name field is required</li>
                            <li>The email field is required</li>
                        </ul>
                    </div>

                    <div class="form-cols"><!-- two form cols -->
                        <div class="col1">
                            <div class="clearfix">
                                <div class="lab"><label for="input-one">Two cols input <span>*</span></label></div>
                                <div class="con"><input type="text" class="input" value="" name="" id="input-one" /></div>
                            </div>
                            <div class="clearfix">
                                <div class="lab"><label>Two cols select</label></div>
                                <div class="con">
                                    <select class="select">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col2">
                            <div class="clearfix error">
                                <div class="lab"><label for="input-two">Two cols input <span>*</span></label></div>
                                <div class="con"><input type="text" class="input datepicker" value="" name="" id="input-two" /></div><!-- // class datepicker switch on jQuery date picker -->
                            </div>
                            <div class="clearfix">
                                <div class="lab"><label>Two cols select</label></div>
                                <div class="con">
                                    <select class="select">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="input-three">Full width input</label></div>
                        <div class="con"><input type="text" class="input" value="" name="" id="input-three" /></div>
                    </div>
                    <div class="clearfix">
                        <div class="lab"><label for="textarea-one">Textarea</label></div>
                        <div class="con"><textarea cols="" rows="" class="textarea" id="textarea-one"></textarea></div>
                    </div>
                    <div class="clearfix textarea-wysiwyg">
                        <div class="lab"><label for="textarea-two">Textarea with wysiwyg</label></div>
                        <div class="con"><textarea cols="" rows="" class="textarea wysiwyg" id="textarea-two"></textarea></div>
                    </div>
                    <div class="clearfix file">
                        <div class="lab"><label for="file">Upload file</label></div>
                        <div class="con"><input type="file" name="" class="upload-file" id="file" /> 	
                            <!--<div class="bubble-left"></div>
                                  <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                                  <div class="bubble-right"></div>--> 
                        </div>
                    </div>   
                    <div class="clearfix checkbox">
                        <div class="lab"><label for="check-one">One checkbox</label></div>
                        <div class="con"><input type="checkbox" name="" id="check-one" /></div>
                    </div>
                    <div class="clearfix checkbox">
                        <div class="lab"><label>Two checkboxes</label></div>
                        <div class="con"><label><input type="checkbox" name="" /> Text checkbox</label> <label><input type="checkbox" name="" /> Text checkbox</label></div>
                    </div>
                    <div class="clearfix checkbox">
                        <div class="lab"><label>Two radio buttons</label></div>
                        <div class="con"><label><input type="radio" name="" /> Text radio</label> <label><input type="radio" name="" /> Text radio</label></div>
                    </div>
                    <div class="btn-submit"><!-- Submit form -->
                        <input type="submit" value="Submit form" class="button" />
                        or <a href="" class="cancel">Cancel</a>
                    </div>
                </fieldset>    
            </form>
        </div><!-- /box-content -->
    </div>
    <!-- /box -->

    <!-- box -->
    <div class="box">
        <div class="headlines">
            <h2><span>Gallery</span></h2>
        </div>
        <div class="box-content">

            <!-- gallery -->
            <div class="gallery">
                <div class="item">
                    <div class="thumb"><a href="public/content-images/img-01-orig.jpg" class="fancy" rel="group"><img src="public/content-images/img-01.jpg" alt="" /></a></div>
                    <div class="tools">
                        <a href="#" class="ico ico-edit"></a>                                           
                        <a href="#" class="ico ico-delete"></a>
                    </div>
                </div>          
                <div class="item">
                    <div class="thumb"><a href="public/content-images/img-02-orig.jpg" class="fancy" rel="group"><img src="public/content-images/img-02.jpg" alt="" /></a></div>
                    <div class="tools">
                        <a href="#" class="ico ico-edit"></a>
                        <a href="#" class="ico ico-delete"></a>
                    </div>
                </div>   
                <div class="item">
                    <div class="thumb"><a href="public/content-images/img-01-orig.jpg" class="fancy" rel="group"><img src="public/content-images/img-01.jpg" alt="" /></a></div>
                    <div class="tools">
                        <a href="#" class="ico ico-edit"></a>
                        <a href="#" class="ico ico-delete"></a>
                    </div>
                </div>   
                <div class="item">
                    <div class="thumb"><a href="public/content-images/img-02-orig.jpg" class="fancy" rel="group"><img src="public/content-images/img-02.jpg" alt="" /></a></div>
                    <div class="tools">
                        <a href="#" class="ico ico-edit"></a>
                        <a href="#" class="ico ico-delete"></a>
                    </div>
                </div>   
                <div class="item">
                    <div class="thumb"><a href="public/content-images/img-01-orig.jpg" class="fancy" rel="group"><img src="public/content-images/img-01.jpg" alt="" /></a></div>
                    <div class="tools">
                        <a href="#" class="ico ico-edit"></a>
                        <a href="#" class="ico ico-delete"></a>
                    </div>
                </div>  
            </div>        
            <!-- /gallery -->
        </div><!-- /box-content -->
    </div>
    <!-- /box -->

    <!-- box -->
    <div id="tabs" class="box">
        <ul class="bookmarks">
            <li><a href="#tabs-1">Tab one</a></li>
            <li><a href="#tabs-2">Tab two</a></li>
            <li><a href="#tabs-3">Tab three</a></li>
        </ul>
        <div class="box-content">    

            <div id="tabs-1">  
                <p>Paragraph ipsum dolor sit amet, consectetur adipiscing <strong>strong text</strong> elit. Phasellus et risus. Maecenas non nunc  <a href="#"> example link</a>. Proin eleifend viverra sapien. Donec <em>italic text</em> id augue. Duis erat nunc, volutpat a, bibendum quis, <a href="#modal" class="modal">open modal window</a> placerat vitae, enim.</p>

                <h1>Headings H1</h1>
                <h2>Headings H2</h2>
                <h3>Headings H3</h3>            
                <h4>Headings H4</h4>
                <h5>Headings H5</h5> 
            </div>

            <div id="tabs-2">
                <div class="cols cols50">
                    <div class="col1">
                        <p><strong class="highlight"> 1/2 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien. Donec id augue. Duis erat nunc, volutpat a, bibendum quis, placerat vitae, enim.</p>
                    </div>
                    <div class="col2">
                        <p><strong class="highlight"> 1/2 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien. Donec id augue. Duis erat nunc, volutpat a, bibendum quis, placerat vitae, enim. </p>
                    </div>
                </div>

                <div class="cols cols3">
                    <div class="col1">
                        <p><strong class="highlight"> 1/3 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien.</p>
                    </div>
                    <div class="col2">
                        <p><strong class="highlight"> 1/3 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien.</p>
                    </div>
                    <div class="col3">
                        <p><strong class="highlight"> 1/3 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien.</p>
                    </div>
                </div>             

                <div class="cols cols4">
                    <div class="col1">
                        <p><strong class="highlight"> 1/4 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien.</p>
                    </div>
                    <div class="col2">
                        <p><strong class="highlight"> 1/4 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien.</p>
                    </div>
                    <div class="col3">
                        <p><strong class="highlight"> 1/4 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien.</p>
                    </div>
                    <div class="col4">
                        <p><strong class="highlight"> 1/4 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien.</p>
                    </div>
                </div>   

                <div class="cols cols2v1">
                    <div class="col1">
                        <p><strong class="highlight"> 2/3 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien. Donec id augue. Duis erat nunc, volutpat a, bibendum quis, placerat vitae, enim.</p>
                    </div>
                    <div class="col2">
                        <p><strong class="highlight"> 1/3 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc.</p>
                    </div>
                </div>      

                <div class="cols cols1v2">
                    <div class="col1">
                        <p><strong class="highlight"> 1/3 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc.</p>
                    </div>
                    <div class="col2">
                        <p><strong class="highlight"> 2/3 col</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et risus. Maecenas non nunc. Proin eleifend viverra sapien. Donec id augue. Duis erat nunc, volutpat a, bibendum quis, placerat vitae, enim.</p>
                    </div>
                </div>
            </div>

            <div id="tabs-3">
                <div class="cols cols4">
                    <div class="col1">
                        <h3>List disc</h3>
                        <ul class="list list-disc">
                            <li>classic list item</li>
                            <li>classic list item</li>
                            <li>classic list item</li>
                        </ul>
                    </div>
                    <div class="col2">
                        <h3>List square</h3>
                        <ul class="list list-square">
                            <li>classic list item</li>
                            <li>classic list item</li>
                            <li>classic list item</li>
                        </ul>
                    </div>
                    <div class="col3">
                        <h3>List dash</h3>
                        <ul class="list list-dash">
                            <li>classic list item</li>
                            <li>classic list item</li>
                            <li>classic list item</li>
                        </ul>
                    </div>
                    <div class="col4">
                        <h3>List number</h3>
                        <ol class="list list-number">
                            <li>classic list item</li>
                            <li>classic list item</li>
                            <li>classic list item</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div><!-- /box-content -->  
    </div>
    <!-- /box -->

    <div class="box-cols">
        <div class="box box-col">
            <div class="headlines">
                <h2><span>Box col</span></h2>
            </div>
            <div class="box-content">
                <form class="formBox" method="post" action="">
                    <fieldset>
                        <div class="clearfix">
                            <div class="lab"><label for="input-col">Input</label></div>
                            <div class="con"><input type="text" class="input" value="" name="" id="input-col" /></div>
                        </div>
                        <div class="clearfix">
                            <div class="lab"><label for="textarea-col">Textarea</label></div>
                            <div class="con"><textarea cols="" rows="" class="textarea" id="textarea-col"></textarea></div>
                        </div>
                        <div class="btn-submit"><!-- Submit form -->
                            <input type="submit" value="Submit form" class="button" />
                            or <a href="" class="cancel">Cancel</a>
                        </div>
                    </fieldset>
                </form>            
            </div>
        </div>

        <div class="box box-col box-last">
            <div class="headlines">
                <h2><span>Box col</span></h2>
            </div>
            <div class="box-content">
                <h3>Heading</h3>
                <p>Lorem ipsum dolor sit amet consectetuer mollis ipsum fermentum In tristique. Vestibulum cursus platea mauris non sapien Vivamus condimentum vitae porttitor vitae.</p> 
                <p>Curabitur cursus cursus enim vitae libero quis facilisis metus neque ligula. Id Nulla sem diam risus in lorem condimentum sagittis Aenean enim. Orci platea lacinia felis Sed urna rutrum malesuada pellentesque dolor wisi. Id wisi a eu Nulla ipsum scelerisque Phasellus Donec adipiscing sed. </p>
                <a href="" class="btn-default"><span>Read more</span></a>           
            </div>          
        </div>
    </div>


</div>
    </body>