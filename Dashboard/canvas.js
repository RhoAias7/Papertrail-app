var canvas = document.querySelector('canvas');

canvas.width = window.innerWidth - 100;
canvas.height = window.innerHeight - 100;

var sys = arbor.ParticleSystem(1000, 400, 1);
sys.parameters({ gravity: true });

sys.renderer = Renderer("#viewport");
var data = {
    nodes: {
        node1: {
            "color": "#6108a7",
            "shape": "dot",
            "label": "Rob"
        },
        node2: {
            "color": "#8a2f0d",
            "shape": "dot",
            "label": "Lorcan"
        },
        node3: {
            "color": "#92B6B1",
            "shape": "dot",
            "label": "Ayo"
        }
    }
    // edges: {
    //     node2: {
    //         node1: {},
    //         node3: {},
    //         node4: {},
    //         node5: {}
    //     },
    //     node1: {
    //         node2: {},
    //         node3: {}
    //     },
    //     node2: {
    //         node1: {},
    //         node3: {}
    //     },
    //     node4: {
    //         node2: {}
    //     },
    //     node5: {
    //         node2: {}
    //     }
    // }
};
sys.graft(data);
