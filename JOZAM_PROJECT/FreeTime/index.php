<!DOCTYPE html>
<html lang="fr" charset="UTF-8">
	<head>
		<title>JOZAM PROJECT</title>
		<meta name="author" content="gyurisc">
		<link rel="stylesheet" type="text/css" href="assets/css/jquery.gridster.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
		<link rel="stylesheet" type="text/css" href="assets/css/boardsStyle.css">
	</head>
	<body>         
		<button id="addBoard">Add board</button>
		<button id="btnshowhide">Show All Boards</button>
		<button id="btnshowhideTravail">Toggle Travail</button>
		<button id="btnshowhideSurveille">Toggle Surveille</button>
        <div id="showorHideBoards">
            <div id="showorHideTravail">
                <div id="duplicater0">
                    <div id="demo-0" class="gridster">
                        <div contenteditable="true">
                            <h2>Travail</h2>
                        </div>
                        <button type="button" id="addWidgetButton" >Add Project</button>
                        <ul id="myList">
                            <li data-row="1" data-col="1" data-sizex="3" data-sizey="2" class="gs-w">
                               <header>
                                    <!--<div class="deleteWidgetDiv">X</div>
                                    <div class="updateWidgetDiv">*</div>-->
                                   <p style="cursor: move;">|||</p>
                                    <div class="dragDiv">
                                        Project1
                                        <div id="loadbutton" class="load">+</div>
                                        <div id="deletebutton" class="delete">*</div>
                                   </div>
                                </header>
                                <div id="divtest" style="overflow:auto;"></div>
                            </li>
                            <li data-row="1" data-col="2" data-sizex="1" data-sizey="1" class="gs-w">
                                <header>
                                    <p style="cursor: move;">|||</p>
                                    <div class="dragDiv">Project2</div>
                                </header>
                            </li>
                            <li data-row="2" data-col="4" data-sizex="1" data-sizey="1" class="gs-w">
                                <header>
                                    <p style="cursor: move;">|||</p>
                                    <div class="dragDiv">Project4</div>
                                </header>
                            </li>
                            <li data-row="1" data-col="3" data-sizex="1" data-sizey="1" class="gs-w">
                                <header>
                                    <p style="cursor: move;">|||</p>
                                    <div class="dragDiv">Project3</div>
                                </header>
                            </li>				
                        </ul>
                    </div>
                </div>
            </div>
            <div id="showorHideSurveille">
                <div id="duplicater1">
                    <div id="demo-1" class="gridster">
                        <div contenteditable="true">
                            <h2>Surveille</h2>
                        </div>
                        <button type="button" id="addWidgetButtonSurveille" >Add Project</button>
                        <ul id="myList1">
                            <li data-row="1" data-col="1" data-sizex="2" data-sizey="1" class="gs-w">
                                <header>
                                    <!--<div class="deleteWidgetDiv">X</div>
                                    <div class="updateWidgetDiv">*</div>-->
                                    <p style="cursor: move;">|||</p>
                                    <div class="dragDiv">Project1</div>
                                </header>
                            </li>
                            <li data-row="1" data-col="2" data-sizex="1" data-sizey="2" class="gs-w">
                                <header>
                                    <p style="cursor: move;">|||</p>
                                    <div class="dragDiv">Project2</div>
                                </header>
                            </li>			
                        </ul>
                    </div>
                </div>

            </div>

            <div id="showorHide">
            <div id="duplicater2">
                <div id="demo-2" class="gridster">
                    <div contenteditable="true">
                        <h2>New Board</h2>
                    </div>
                    <button type="button" id="addWidgetButtonNew" >Add Project</button>
                    <ul id="myList2">
                        <li data-row="1" data-col="1" data-sizex="1" data-sizey="1" class="gs-w">
                            <header>
                                <p style="cursor: move;">|||</p>
                                <div class="dragDiv">New</div>
                            </header>
                        </li>				
                    </ul>
                </div>
            </div>
            </div>
        
        </div>
        
		
		<script src="assets/jquery-1.11.2.js"></script>
		<script src="assets/jquery.gridster.min.js" charster="utf-8"></script>
		
		<script>
		//make all editable
            $('#showorHideBoards div').attr('contenteditable','true');

            //duplicate             
			var i = 2;
			
			function duplicate() {
                "use strict";
				var original = document.getElementById('duplicater' + i);
				var clone = original.cloneNode(true); // "deep" clone
                //i += i;
				clone.id = "duplicetor" + ++i; // there can only be one element with an ID
				clone.onclick = duplicate; // event handlers are not cloned
				original.parentNode.appendChild(clone);
				--i;// -= i;
			}
			document.getElementById('addBoard').onclick = duplicate;
			
		
				
			function getAllElementsWithAttribute(attribute) {
			    var matchingElements = [];
			    var allElements = document.getElementsByTagName('*');
                var i = 0;
                var n = allElements.length;
			    for (i = 0; i < n; i++)
			    {
				  if (allElements[i].getAttribute(attribute) !== null)
				  {
				    matchingElements.push(allElements[i]);
				  }
			    }
			    return matchingElements;
			}
		
			var gridster = [];
			var startPosition = {};
			var taille = 10;
			$(function()
			{
                var nombre = 0;
				for(nombre =0; nombre < taille; nombre++)
				{
					gridster[nombre] = $("#demo-" + nombre + " ul").gridster({
						namespace: '#demo-' + nombre,
						widget_base_dimensions: [100, 100],
						widget_margins: [5, 5],
                        autogrow_cols: true,
                       // widget_seletor: 'li'
						resize: {
							enabled: true
						},
                        draggable: {
                            handle: 'header p'                        
                        }
					}).data('gridster');
				}
                				
				var testID = "voila le test" + "\r\n";
                var j = 0;
                var  n = getAllElementsWithAttribute("data-row").length;
				for (j =0; j < n; j++)
				{
					testID += getAllElementsWithAttribute("data-row")[j].getAttribute('data-row');
				}
				
				$(document).on( "click", "#addWidgetButton", function(e) {
					 e.preventDefault(); 
					 gridster[0].add_widget.apply(gridster[0], ['<li data-row="1" data-col="2" data-sizex="1" data-sizey="1" class="gs-w"><header><p style="cursor: move;">|||</p><div class="dragDiv">New</div></header></li>', 1, 1]);
					  $.ajax({
						type: "POST",
						url: 'trait.php',
						data: { testID : testID },
						success: function(data)
						{
							alert("Project created!");
						}
					});
				});
                
                $(document).on( "click", "#addWidgetButtonSurveille", function(e) {
					 e.preventDefault(); 
					 gridster[1].add_widget.apply(gridster[1], ['<li data-row="1" data-col="2" data-sizex="1" data-sizey="1" class="gs-w"><header><p style="cursor: move;">|||</p><div class="dragDiv">New</div></header></li>', 1, 1]);
					  $.ajax({
						type: "POST",
						url: 'trait.php',
						data: { testID : testID },
						success: function(data)
						{
							alert("Project created!");
						}
					});
				});
                
                $(document).on( "click", "#addWidgetButtonNew", function(e) {
					 e.preventDefault(); 
					 gridster[2].add_widget.apply(gridster[2], ['<li data-row="1" data-col="2" data-sizex="1" data-sizey="1" class="gs-w"><header><p style="cursor: move;">|||</p><div class="dragDiv">New</div></header></li>', 1, 1]);
					  $.ajax({
						type: "POST",
						url: 'trait.php',
						data: { testID : testID },
						success: function(data)
						{
							alert("Project created!");
						}
					});
				});
				
				$('.gridster li').on('mousedown', mouseDownHandler).on('mouseup', mouseUpHandler );
			});
            
            
            
            

			function mouseDownHandler(event)
			{
				event = event || window.event; // IE-ism

				/** save start position to see if we dragged **/
				startPosition = {
					x: event.clientX,
					y: event.clientY
				};
			}
			function mouseUpHandler(event)
			{
				event = event || window.event; // IE-ism
				
				/** get drop position to see if we dragged and where we dropped it **/
				var dropPosition = {
					x: event.clientX,
					y: event.clientY
				};
				
				/** the element we clicked or dragged on **/
				var liElement = $(this);
				/** the gridster of the element we clicked on **/
				var currentGridster = liElement.closest('.gridster');
				/** the gridster object of the element we clicked on **/
				var gridsterObject = getGridsterObjectById(currentGridster.attr('id'));
				
				/** check if we dragged **/
				if( startPosition.x == dropPosition.x && startPosition.y == dropPosition.y ) {
					return true;
				}
				
				/** loop through all gridsters to check if we dropped the element in here **/
				$('.gridster').each(function() {
					var offset = $(this).offset();
					
					/** check if element is dropped in the current gridster **/
					if( 
						dropPosition.x > offset.left && 
						dropPosition.x < ( offset.left+$(this).width() ) &&
						dropPosition.y > offset.top && 
						dropPosition.y < ( offset.top+$(this).height() ) &&
						$(this).attr('id') != currentGridster.attr('id')
					) {
						/** get the new gridster object to put the element in **/
						newGridsterObject = getGridsterObjectById($(this).attr('id'));
						
						/** get the HTML of the liElement **/
						var newLiElement = liElement.clone().removeAttr('style').wrap('<p>').parent().html();
						
						/** add the listeners on the new element **/
						$(newLiElement).on('mousedown', mouseDownHandler).on('mouseup', mouseUpHandler );
						
						/** add the liElement widget **/
						newGridsterObject.add_widget(newLiElement);
						
						/** remove the old widget **/
						gridsterObject.remove_widget(liElement);
					}
				});
			}

			/**
			 * Get the gridster object by id
			 */
			function getGridsterObjectById(id)
			{
				return $('#'+id).find('ul').data('gridster');
			}
		
		</script>
		
		<script>
		//Show and Hide Boards
			$(document).ready(function(){
                //$("#showorHide").hide();
                
				$("#btnshowhide").click(function(){
					$("#showorHideBoards").toggle();
				});
                $("#btnshowhideTravail").click(function(){
					$("#showorHideTravail").toggle();
				});
                $("#btnshowhideSurveille").click(function(){
					$("#showorHideSurveille").toggle();
				});
			});
		</script>
        
        <script>
            //load data from files
            $(document).ready(function(){
                $("#loadbutton").click(function(){
                    $("#divtest").load("gtxml.xml");
                });
            });
            //delete data from files
            $(document).ready(function(){
                $("#deletebutton").click(function(){
                    document.getElementById("divtest").innerHTML = "";
                });
            });
        </script>
	</body>
</html>