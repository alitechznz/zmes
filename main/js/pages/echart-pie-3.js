$(function() {
    "use strict";
    // ------------------------------
    // Basic pie chart
    // ------------------------------
    // based on prepared DOM, initialize echarts instance
      
        
        var basicpieChart_2063 = echarts.init(document.getElementById('basic-pie_2063'));
        var option = {
            // Add title
                title: {
                    text: '',
                    subtext: 'Indicators',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['Population', 'Povert']
                },

                // Add custom colors
                color: ['#689f38', '#ff8f00'],

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,

                // Add series
                series: [{
                    name: 'Indicators',
                    type: 'pie',
                    radius: '50%',
                    center: ['50%', '57.5%'],
                    data: [
                        {value: 335, name: 'Population'},
                        {value: 310, name: 'Povert'},
                       
                    ]
                }]
        };
        basicpieChart_2063.setOption(option);
        
   
        //------------------------------------------------------
       // Resize chart on menu width change and window resize
       //------------------------------------------------------
        $(function () {

                // Resize chart on menu width change and window resize
                $(window).on('resize', resize);
                $(".sidebartoggler").on('click', resize);

                // Resize function
                function resize() {
                    setTimeout(function() {

                        // Resize chart
                        basicpieChart.resize();
                        basicdoughnutChart.resize();
                        customizedChart.resize();
                        nestedChart.resize();
                        poleChart.resize();
                    }, 200);
                }
            });
});