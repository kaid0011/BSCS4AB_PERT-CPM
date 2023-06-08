<div class="pertchartt">
<div class="title">
    <h2>PERT Chart</h2>
</div>
<div id="allSampleContent" class="p-4 w-full">
    <script id="code">
        function init() {

            // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
            // For details, see https://gojs.net/latest/intro/buildingObjects.html
            const $ = go.GraphObject.make; // for more concise visual tree definitions

            // colors used, named for easier identification
            var blue = "#0288D1";
            var pink = "#B71C1C";
            var pinkfill = "#F8BBD0";
            var bluefill = "#B3E5FC";

            myDiagram =
                $(go.Diagram, "myDiagramDiv", {
                    initialAutoScale: go.Diagram.Uniform,
                    layout: $(go.LayeredDigraphLayout, {
                        alignOption: go.LayeredDigraphLayout.AlignAll
                    })
                });

            // The node template shows the activity name in the middle as well as
            // various statistics about the activity, all surrounded by a border.
            // The border's color is determined by the node data's ".critical" property.
            // Some information is not available as properties on the node data,
            // but must be computed -- we use converter functions for that.
            myDiagram.nodeTemplate =
                $(go.Node, "Auto",
                    $(go.Shape, "Rectangle", // the border
                        {
                            fill: "white",
                            strokeWidth: 2
                        },
                        new go.Binding("fill", "critical", b => b ? pinkfill : bluefill),
                        new go.Binding("stroke", "critical", b => b ? pink : blue)),
                    $(go.Panel, "Table", {
                            padding: 0.5
                        },
                        $(go.RowColumnDefinition, {
                            column: 1,
                            separatorStroke: "black"
                        }),
                        $(go.RowColumnDefinition, {
                            column: 2,
                            separatorStroke: "black"
                        }),
                        $(go.RowColumnDefinition, {
                            row: 1,
                            separatorStroke: "black",
                            background: "white",
                            coversSeparators: true
                        }),
                        $(go.RowColumnDefinition, {
                            row: 2,
                            separatorStroke: "black"
                        }),
                        $(go.TextBlock, // earlyStart
                            new go.Binding("text", "earlyStart"), {
                                row: 0,
                                column: 0,
                                margin: 5,
                                textAlign: "center"
                            }),
                        $(go.TextBlock,
                            new go.Binding("text", "length"), {
                                row: 0,
                                column: 1,
                                margin: 5,
                                textAlign: "center"
                            }),
                        $(go.TextBlock, // earlyFinish
                            new go.Binding("text", "",
                                d => (d.earlyStart + d.length).toFixed(2)), {
                                row: 0,
                                column: 2,
                                margin: 5,
                                textAlign: "center"
                            }),

                        $(go.TextBlock,
                            new go.Binding("text", "text"), {
                                row: 1,
                                column: 0,
                                columnSpan: 3,
                                margin: 5,
                                textAlign: "center",
                                font: "bold 14px sans-serif"
                            }),

                        $(go.TextBlock, // lateStart
                            new go.Binding("text", "",
                                d => (d.lateFinish - d.length).toFixed(2)), {
                                row: 2,
                                column: 0,
                                margin: 5,
                                textAlign: "center"
                            }),
                        $(go.TextBlock, // slack
                            new go.Binding("text", "",
                                d => (d.lateFinish - (d.earlyStart + d.length)).toFixed(2)), {
                                row: 2,
                                column: 1,
                                margin: 5,
                                textAlign: "center"
                            }),
                        $(go.TextBlock, // lateFinish
                            new go.Binding("text", "lateFinish"), {
                                row: 2,
                                column: 2,
                                margin: 5,
                                textAlign: "center"
                            })
                    ) // end Table Panel
                ); // end Node

            // The link data object does not have direct access to both nodes
            // (although it does have references to their keys: .from and .to).
            // This conversion function gets the GraphObject that was data-bound as the second argument.
            // From that we can get the containing Link, and then the Link.fromNode or .toNode,
            // and then its node data, which has the ".critical" property we need.
            //
            // But note that if we were to dynamically change the ".critical" property on a node data,
            // calling myDiagram.model.updateTargetBindings(nodedata) would only update the color
            // of the nodes.  It would be insufficient to change the appearance of any Links.
            function linkColorConverter(linkdata, elt) {
                var link = elt.part;
                if (!link) return blue;
                var f = link.fromNode;
                if (!f || !f.data || !f.data.critical) return blue;
                var t = link.toNode;
                if (!t || !t.data || !t.data.critical) return blue;
                return pink; // when both Link.fromNode.data.critical and Link.toNode.data.critical
            }

            // The color of a link (including its arrowhead) is red only when both
            // connected nodes have data that is ".critical"; otherwise it is blue.
            // This is computed by the binding converter function.
            myDiagram.linkTemplate =
                $(go.Link, {
                        toShortLength: 6,
                        toEndSegmentLength: 20
                    },
                    $(go.Shape, {
                            strokeWidth: 4
                        },
                        new go.Binding("stroke", "", linkColorConverter)),
                    $(go.Shape, // arrowhead
                        {
                            toArrow: "Triangle",
                            stroke: null,
                            scale: 1.5
                        },
                        new go.Binding("fill", "", linkColorConverter))
                );

            // here's the data defining the graph
            var nodeDataArray = [{
                    key: 1,
                    text: "Start",
                    length: 0.00,
                    earlyStart: 0.00,
                    lateFinish: 0.00,
                    critical: true
                }
                <?php
                $project = $_SESSION['project'];
                foreach ($project as $task) {
                ?>, {
                        key: <?php echo $task['taskid'] + 1; ?>,
                        text: <?php echo $task['taskid']; ?>,
                        length: <?php echo number_format((float)$task['time'], 2, '.', ''); ?>,
                        earlyStart: <?php echo number_format((float)$task['es'], 2, '.', ''); ?>,
                        lateFinish: <?php echo number_format((float)$task['lf'], 2, '.', ''); ?>,
                        critical: <?php echo $task['isCritical'] == 1 ? 1 : 0; ?>
                    }
                <?php } ?>, {
                    key: <?php echo count($project) + 2; ?>,
                    text: "Finish",
                    length: 0,
                    earlyStart: <?php echo number_format((float)$_SESSION['finish_time'], 2, '.', ''); ?>,
                    lateFinish: <?php echo number_format((float)$_SESSION['finish_time'], 2, '.', ''); ?>,
                    critical: true
                }
            ];

            // DITO KA MAGBABAGO PARA SA PREREQUISITES SAKA CONNECTION NG BOXES
            var linkDataArray = [
                <?php
                $project = $_SESSION['project'];
                foreach ($project as $task) {
                    $task['prereq'] =  explode(";", $task['prereq']);
                    if (count($task['prereq']) > 1) {
                        //if more than 1 prereq
                        foreach ($task['prereq'] as $prereq) {
                ?> {
                                from: <?php echo $prereq + 1; ?>,
                                to: <?php echo $task['taskid'] + 1; ?>
                            },
                        <?php
                        }
                    } else {
                        $pre = implode(",", $task['prereq']);
                        if ($pre == '-1') {
                            $pre = 0;
                        }
                        ?> {
                            from: <?php echo $pre + 1; ?>,
                            to: <?php echo $task['taskid'] + 1; ?>
                        },
                <?php }
                } ?>

                {
                    from: <?php echo count($project) + 1; ?>,
                    to: <?php echo count($project) + 2; ?>
                }
            ];
            myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);

            // create an unbound Part that acts as a "legend" for the diagram
            myDiagram.add(
                $(go.Node, "Auto",
                    $(go.Shape, "Rectangle", // the border
                        {
                            fill: "#EEEEEE"
                        }),
                    $(go.Panel, "Table",
                        $(go.RowColumnDefinition, {
                            column: 1,
                            separatorStroke: "black"
                        }),
                        $(go.RowColumnDefinition, {
                            column: 2,
                            separatorStroke: "black"
                        }),
                        $(go.RowColumnDefinition, {
                            row: 1,
                            separatorStroke: "black",
                            background: "#EEEEEE",
                            coversSeparators: true
                        }),
                        $(go.RowColumnDefinition, {
                            row: 2,
                            separatorStroke: "black"
                        }),
                        $(go.TextBlock, "Early Start", {
                            row: 0,
                            column: 0,
                            margin: 5,
                            textAlign: "center"
                        }),
                        $(go.TextBlock, "Length", {
                            row: 0,
                            column: 1,
                            margin: 5,
                            textAlign: "center"
                        }),
                        $(go.TextBlock, "Early Finish", {
                            row: 0,
                            column: 2,
                            margin: 5,
                            textAlign: "center"
                        }),

                        $(go.TextBlock, "Activity Name", {
                            row: 1,
                            column: 0,
                            columnSpan: 3,
                            margin: 5,
                            textAlign: "center",
                            font: "bold 14px sans-serif"
                        }),

                        $(go.TextBlock, "Late Start", {
                            row: 2,
                            column: 0,
                            margin: 5,
                            textAlign: "center"
                        }),
                        $(go.TextBlock, "Slack", {
                            row: 2,
                            column: 1,
                            margin: 5,
                            textAlign: "center"
                        }),
                        $(go.TextBlock, "Late Finish", {
                            row: 2,
                            column: 2,
                            margin: 5,
                            textAlign: "center"
                        })
                    ) // end Table Panel
                ));
        }
        window.addEventListener('DOMContentLoaded', init);
    </script>

    <div id="myDiagramDiv" class="box" style="width:100%; height:300px; z-index: 0;"></div>

</div>
</div>