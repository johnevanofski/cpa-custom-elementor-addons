const triggerOnIntersection = (el, callback) => {
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                callback()
                observer.unobserve(entry.target)
            }
        })
    })
    observer.observe(el)
}

const sunbustChartHandler = () => {
    // console.log("sunburst chart handler fired");
    const $sunburstCharts = Array.from(document.getElementsByClassName('sunburst-chart'));

    $sunburstCharts.forEach(($chart) => {
        const getDataAttribue = (el, attr) => el.getAttribute(`data-${attr}`); 
        const data = {
            'title' : getDataAttribue($chart, 'title'),
            'renewable_biomass' : getDataAttribue($chart, 'renewable_biomass'),
            'renewable_geothermal' : getDataAttribue($chart, 'renewable_geothermal'),
            'renewable_ehydro' : getDataAttribue($chart, 'renewable_ehydro'),
            'renewable_solar' : getDataAttribue($chart, 'renewable_solar'),
            'renewable_wind' : getDataAttribue($chart, 'renewable_wind'),
            'non_coal' : getDataAttribue($chart, 'non_coal'),
            'non_gas' : getDataAttribue($chart, 'non_gas'),
            'non_lhydro' : getDataAttribue($chart, 'non_lhydro'),
            'non_nuclear' : getDataAttribue($chart, 'non_nuclear'),
            'non_unspec' : getDataAttribue($chart, 'non_unspec'),
            'total_renewable' : getDataAttribue($chart, 'total_renewable'),
            'total_non' : getDataAttribue($chart, 'total_non'),
            'total' : getDataAttribue($chart, 'total'),
            'show_hoverinfo' : getDataAttribue($chart, 'show_hoverinfo'),
            'hovertemplate' : getDataAttribue($chart, 'hovertemplate'),
            'color_1' : getDataAttribue($chart, 'color_1'),
			'color_2' : getDataAttribue($chart, 'color_2'),
            'insidetext_size' : getDataAttribue($chart, 'insidetext_size'),
			'insidetext_orientation' : getDataAttribue($chart, 'insidetext_orientation'),
			'outsidetext_size' : getDataAttribue($chart, 'outsidetext_size'),
			'outsidetext_color' : getDataAttribue($chart, 'outsidetext_color'),

        }

        if (Plotly) {
            const plotData = [{
                type: "sunburst",
                labels: [data.title, "Renewable", "Non-Renewable", "Biomass & Biowaste", "Geothermal", "Eligible Hydroelectric", "Solar", "Wind", "Large Hydroelectric", "Coal", "Natural Gas", "Nuclear", "Unspecified"],
                parents: ["", data.title, data.title, "Renewable", "Renewable", "Renewable", "Renewable", "Renewable", "Non-Renewable", "Non-Renewable", "Non-Renewable", "Non-Renewable", "Non-Renewable"],
                values:  [data.total, data.total_renewable, data.total_non, data.renewable_biomass, data.renewable_geothermal, data.renewable_ehydro, data.renewable_solar, data.renewable_wind, data.non_lhydro, data.non_coal, data.non_gas, data.non_nuclear, data.non_unspec],
                leaf: {opacity: 0.4},
                marker: {line: {width: 2}},
                branchvalues: "total",
                outsidetextfont: {
                        size: data.outsidetext_size, 
                        color: data.outsidetext_color,
                    },
                insidetextorientation: data.insidetext_orientation,
                insidetextfont: {
                    size: data.insidetext_size
                },
                hoverinfo: data.show_hoverinfo.length > 0 || "none",
                hovertemplate: data.show_hoverinfo.length > 0 && data.hovertemplate,
                textfont: {
                    family: "Poppins, sans-serif"
                }
              }]

            const plotLayout = {
                margin: {l: 0, r: 0, b: 0, t: 0},
                sunburstcolorway: [data.color_1, data.color_2],
            }
            Plotly.newPlot($chart, plotData, plotLayout, {displayModeBar: false, responsive: true})
        }

        
    })

    
}

const svgPainterHandler = () => {
    // console.log('svg painter handler fired');

    const transtionDurationDataAttribue = 'data-transition-duration';
    const $svgPaint = Array.from(document.getElementsByClassName('svgp_container'));

    $svgPaint.forEach(($svg) => {

        const id = $svg.getAttribute('id');
        const $paths = Array.from($svg.getElementsByTagName('path'));
        const transitionDuration = $svg.getAttribute(transtionDurationDataAttribue);

        const $animationStyleBlock = document.createElement('style');
        
        $paths.forEach(($path, i) => {
            const pathLength = $path.getTotalLength();
            $path.setAttribute('id', `path-${id}-${i}`);

            $animationStyleBlock.innerHTML += `
                #path-${id}-${i} {
                    opacity: 1;
                    transition: opacity 0.2s ease-in 0.4s;
                    stroke-dasharray: ${pathLength};
                    stroke-dashoffset: ${pathLength};
                    animation: animation-${id}-${i} ${transitionDuration}s linear forwards;
                }
                @keyframes animation-${id}-${i} { 
                    to {
                        stroke-dashoffset: 0;
                    }
                }
            `;
            triggerOnIntersection($svg, () => $svg.appendChild($animationStyleBlock));
        });
    });

}



window.addEventListener('elementor/frontend/init', () => {
    // console.log("Elementor frontend loaded");
    elementorFrontend.hooks.addAction( 'frontend/element_ready/power_sunburst.default', sunbustChartHandler );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/svg_painter.default', svgPainterHandler );
})