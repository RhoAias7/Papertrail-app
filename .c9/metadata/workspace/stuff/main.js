{"filter":false,"title":"main.js","tooltip":"/stuff/main.js","undoManager":{"mark":24,"position":24,"stack":[[{"start":{"row":0,"column":0},"end":{"row":529,"column":0},"action":"remove","lines":["// //","// // site.js","// //","// // the arbor.js website","// //","// (function($) {","//   // var trace = function(msg){","//   //   if (typeof(window)=='undefined' || !window.console) return","//   //   var len = arguments.length, args = [];","//   //   for (var i=0; i<len; i++) args.push(\"arguments[\"+i+\"]\")","//   //   eval(\"console.log(\"+args.join(\",\")+\")\")","//   // }  ","","//   var Renderer = function(elt) {","//     var dom = $(elt)","//     var canvas = dom.get(0)","//     var ctx = canvas.getContext(\"2d\");","//     var gfx = arbor.Graphics(canvas)","//     var sys = null","","//     var _vignette = null","//     var selected = null,","//       nearest = null,","//       _mouseP = null;","","","//     var that = {","//       init: function(pSystem) {","//         sys = pSystem","//         sys.screen({","//           size: {","//             width: dom.width(),","//             height: dom.height()","//           },","//           padding: [36, 60, 36, 60]","//         })","","//         $(window).resize(that.resize)","//         that.resize()","//         that._initMouseHandling()","","//         if (document.referrer.match(/echolalia|atlas|halfviz/)) {","//           // if we got here by hitting the back button in one of the DatabaseNotes2, ","//           // start with the DatabaseNotes2 section pre-selected","//           that.switchSection('DatabaseNotes2')","//         }","//       },","//       resize: function() {","//         canvas.width = $(window).width()","//         canvas.height = .75 * $(window).height()","//         sys.screen({","//           size: {","//             width: canvas.width,","//             height: canvas.height","//           }","//         })","//         _vignette = null","//         that.redraw()","//       },","//       redraw: function() {","//         gfx.clear()","//         sys.eachEdge(function(edge, p1, p2) {","//           if (edge.source.data.alpha * edge.target.data.alpha == 0) return","//           gfx.line(p1, p2, {","//             stroke: \"#b2b19d\",","//             width: 2,","//             alpha: edge.target.data.alpha","//           })","//         })","//         sys.eachNode(function(node, pt) {","//           var w = Math.max(20, 20 + gfx.textWidth(node.name))","//           if (node.data.alpha === 0) return","//           if (node.data.shape == 'dot') {","//             gfx.oval(pt.x - w / 2, pt.y - w / 2, w, w, {","//               fill: node.data.color,","//               alpha: node.data.alpha","//             })","//             gfx.text(node.name, pt.x, pt.y + 7, {","//               color: \"white\",","//               align: \"center\",","//               font: \"Arial\",","//               size: 12","//             })","//             gfx.text(node.name, pt.x, pt.y + 7, {","//               color: \"white\",","//               align: \"center\",","//               font: \"Arial\",","//               size: 12","//             })","//           } else {","//             gfx.rect(pt.x - w / 2, pt.y - 8, w, 20, 4, {","//               fill: node.data.color,","//               alpha: node.data.alpha","//             })","//             gfx.text(node.name, pt.x, pt.y + 9, {","//               color: \"white\",","//               align: \"center\",","//               font: \"Arial\",","//               size: 12","//             })","//             gfx.text(node.name, pt.x, pt.y + 9, {","//               color: \"white\",","//               align: \"center\",","//               font: \"Arial\",","//               size: 12","//             })","//           }","//         })","//         that._drawVignette()","//       },","","//       _drawVignette: function() {","//         var w = canvas.width","//         var h = canvas.height","//         var r = 20","","//         if (!_vignette) {","//           var top = ctx.createLinearGradient(0, 0, 0, r)","//           top.addColorStop(0, \"#e0e0e0\")","//           top.addColorStop(.7, \"rgba(255,255,255,0)\")","","//           var bot = ctx.createLinearGradient(0, h - r, 0, h)","//           bot.addColorStop(0, \"rgba(255,255,255,0)\")","//           bot.addColorStop(1, \"white\")","","//           _vignette = {","//             top: top,","//             bot: bot","//           }","//         }","","//         // top","//         ctx.fillStyle = _vignette.top","//         ctx.fillRect(0, 0, w, r)","","//         // bot","//         ctx.fillStyle = _vignette.bot","//         ctx.fillRect(0, h - r, w, r)","//       },","","//       switchMode: function(e) {","//         if (e.mode == 'hidden') {","//           dom.stop(true).fadeTo(e.dt, 0, function() {","//             if (sys) sys.stop()","//             $(this).hide()","//           })","//         } else if (e.mode == 'visible') {","//           dom.stop(true).css('opacity', 0).show().fadeTo(e.dt, 1, function() {","//             that.resize()","//           })","//           if (sys) sys.start()","//         }","//       },","","//       switchSection: function(newSection) {","//         var parent = sys.getEdgesFrom(newSection)[0].source","//         var children = $.map(sys.getEdgesFrom(newSection), function(edge) {","//           return edge.target","//         })","","//         sys.eachNode(function(node) {","//           if (node.data.shape == 'dot') return // skip all but leafnodes","","//           var nowVisible = ($.inArray(node, children) >= 0)","//           var newAlpha = (nowVisible) ? 1 : 0","//           var dt = (nowVisible) ? .5 : .5","//           sys.tweenNode(node, dt, {","//             alpha: newAlpha","//           })","","//           if (newAlpha == 1) {","//             node.p.x = parent.p.x + .05 * Math.random() - .025","//             node.p.y = parent.p.y + .05 * Math.random() - .025","//             node.tempMass = .001","//           }","//         })","//       },","","","//       _initMouseHandling: function() {","//         // no-nonsense drag and drop (thanks springy.js)","//         selected = null;","//         nearest = null;","//         var dragged = null;","//         var oldmass = 1","","//         var _section = null","","//         var handler = {","//           moved: function(e) {","//             var pos = $(canvas).offset();","//             _mouseP = arbor.Point(e.pageX - pos.left, e.pageY - pos.top)","//             nearest = sys.nearest(_mouseP);","","//             if (!nearest.node) return false","","//             if (nearest.node.data.shape != 'dot') {","//               selected = (nearest.distance < 50) ? nearest : null","//               if (selected) {","//                 dom.addClass('linkable')","//                 window.status = selected.node.data.link.replace(/^\\//, \"http://\" + window.location.host + \"/\").replace(/^#/, '')","//               } else {","//                 dom.removeClass('linkable')","//                 window.status = ''","//               }","//             } else if ($.inArray(nearest.node.name, ['arbor.js', 'code', 'docs', 'DatabaseNotes2']) >= 0) {","//               if (nearest.node.name != _section) {","//                 _section = nearest.node.name","//                 that.switchSection(_section)","//               }","//               dom.removeClass('linkable')","//               window.status = ''","//             }","","//             return false","//           },","//           clicked: function(e) {","//             var pos = $(canvas).offset();","//             _mouseP = arbor.Point(e.pageX - pos.left, e.pageY - pos.top)","//             nearest = dragged = sys.nearest(_mouseP);","","//             if (nearest && selected && nearest.node === selected.node) {","//               var link = selected.node.data.link","//               if (link.match(/^#/)) {","//                 $(that).trigger({","//                   type: \"navigate\",","//                   path: link.substr(1)","//                 })","//               } else {","//                 window.location = link","//               }","//               return false","//             }","","","//             if (dragged && dragged.node !== null)","//               dragged.node.fixed = true","","//             $(canvas).unbind('mousemove', handler.moved);","//             $(canvas).bind('mousemove', handler.dragged)","//             $(window).bind('mouseup', handler.dropped)","","//             return false","//           },","//           dragged: function(e) {","//             var old_nearest = nearest && nearest.node._id","//             var pos = $(canvas).offset();","//             var s = arbor.Point(e.pageX - pos.left, e.pageY - pos.top)","","//             if (!nearest) return","//             if (dragged !== null && dragged.node !== null) {","//               var p = sys.fromScreen(s)","//               dragged.node.p = p","//             }","","//             return false","//           },","","//           dropped: function(e) {","//             if (dragged === null || dragged.node === undefined) return","//             if (dragged.node !== null)","//               dragged.node.fixed = false","//             dragged.node.tempMass = 1000","//             dragged = null;","//             // selected = null","//             $(canvas).unbind('mousemove', handler.dragged)","//             $(window).unbind('mouseup', handler.dropped)","//             $(canvas).bind('mousemove', handler.moved);","//             _mouseP = null","//             return false","//           }","","","//         }","","//         $(canvas).mousedown(handler.clicked);","//         $(canvas).mousemove(handler.moved);","","//       }","//     }","","//     return that","//   }","","","//   var Nav = function(elt) {","//     var dom = $(elt)","","//     var _path = null","","//     var that = {","//       init: function() {","//         $(window).bind('popstate', that.navigate)","//         dom.find('> a').click(that.back)","//         $('.more').one('click', that.more)","","//         $('#docs dl:not(.datastructure) dt').click(that.reveal)","//         that.update()","//         return that","//       },","//       more: function(e) {","//         $(this).removeAttr('href').addClass('less').html('&nbsp;').siblings().fadeIn()","//         $(this).next('h2').find('a').one('click', that.less)","","//         return false","//       },","//       less: function(e) {","//         var more = $(this).closest('h2').prev('a')","//         $(this).closest('h2').prev('a')","//           .nextAll().fadeOut(function() {","//           $(more).text('creation & use').removeClass('less').attr('href', '#')","//         })","//         $(this).closest('h2').prev('a').one('click', that.more)","","//         return false","//       },","//       reveal: function(e) {","//         $(this).next('dd').fadeToggle('fast')","//         return false","//       },","//       back: function() {","//         _path = \"/\"","//         if (window.history && window.history.pushState) {","//           window.history.pushState({","//             path: _path","//           }, \"\", _path);","//         }","//         that.update()","//         return false","//       },","//       navigate: function(e) {","//         var oldpath = _path","//         if (e.type == 'navigate') {","//           _path = e.path","//           if (window.history && window.history.pushState) {","//             window.history.pushState({","//               path: _path","//             }, \"\", _path);","//           } else {","//             that.update()","//           }","//         } else if (e.type == 'popstate') {","//           var state = e.originalEvent.state || {}","//           _path = state.path || window.location.pathname.replace(/^\\//, '')","//         }","//         if (_path != oldpath) that.update()","//       },","//       update: function() {","//         var dt = 'fast'","//         if (_path === null) {","//           // this is the original page load. don't animate anything just jump","//           // to the proper state","//           _path = window.location.pathname.replace(/^\\//, '')","//           dt = 0","//           dom.find('p').css('opacity', 0).show().fadeTo('slow', 1)","//         }","","//         switch (_path) {","//           case '':","//           case '/':","//             dom.find('p').text('a graph visualization library using web workers and jQuery')","//             dom.find('> a').removeClass('active').attr('href', '#')","","//             $('#docs').fadeTo('fast', 0, function() {","//               $(this).hide()","//               $(that).trigger({","//                 type: 'mode',","//                 mode: 'visible',","//                 dt: dt","//               })","//             })","//             document.title = \"arbor.js\"","//             break","","//           case 'introduction':","//           case 'reference':","//             $(that).trigger({","//               type: 'mode',","//               mode: 'hidden',","//               dt: dt","//             })","//             dom.find('> p').text(_path)","//             dom.find('> a').addClass('active').attr('href', '#')","//             $('#docs').stop(true).css({","//               opacity: 0","//             }).show().delay(333).fadeTo('fast', 1)","","//             $('#docs').find(\">div\").hide()","//             $('#docs').find('#' + _path).show()","//             document.title = \"arbor.js Â» \" + _path","//             break","//         }","","//       }","//     }","//     return that","//   }","","//   $(document).ready(function() {","//     var CLR = {","//       branch: \"#b2b19d\",","//       code: \"orange\",","//       doc: \"#922E00\",","//       demo: \"#a7af00\"","//     }","","//     var theUI = {","//       nodes: {","//         Robert: {","//           color: \"#007bff\",","//           shape: \"dot\"","//         },","","//         DatabaseNotes2: {","//           color: \"#007bff\",","//           shape: \"dot\"","//         },","","//         \"Database Note 3\": {","//           color: \"#007bff\",","//           shape: \"dot\"","//         },","","//         DatabaseNotes2: {","//           color: CLR.branch,","//           shape: \"dot\",","//           alpha: 1","//         },","//         halfviz: {","//           color: CLR.demo,","//           alpha: 0,","//           link: '/halfviz'","//         },","//         atlas: {","//           color: CLR.demo,","//           alpha: 0,","//           link: '/atlas'","//         },","//         echolalia: {","//           color: CLR.demo,","//           alpha: 0,","//           link: '/echolalia'","//         },","","//         docs: {","//           color: CLR.branch,","//           shape: \"square\",","//           alpha: 1","//         },","//         reference: {","//           color: CLR.doc,","//           alpha: 0,","//           link: '#reference'","//         },","//         introduction: {","//           color: CLR.doc,","//           alpha: 0,","//           link: '#introduction'","//         },","","//         code: {","//           color: CLR.branch,","//           shape: \"dot\",","//           alpha: 1","//         },","//         github: {","//           color: CLR.code,","//           alpha: 0,","//           link: 'https://github.com/samizdatco/arbor'","//         },","//         \".zip\": {","//           color: CLR.code,","//           alpha: 0,","//           link: '/js/dist/arbor-v0.92.zip'","//         },","//         \".tar.gz\": {","//           color: CLR.code,","//           alpha: 0,","//           link: '/js/dist/arbor-v0.92.tar.gz'","//         }","//       },","//       edges: {","//         // Robert: {","//         //   DatabaseNotes2: {","//         //     length: .8","//         //   },","//         //   docs: {","//         //     length: .8","//         //   },","//         //   code: {","//         //     length: .8","//         //   }","//         // },","//         DatabaseNotes2: {","//           halfviz: {},","//           atlas: {},","//           echolalia: {}","//         },","//         docs: {","//           halfviz: {},","//           introduction: {}","//         },","//         code: {","//           \".zip\": {},","//           \".tar.gz\": {},","//           \"github\": {}","//         }","//       }","//     }","","","//     var sys = arbor.ParticleSystem()","//     sys.parameters({","//       stiffness: 900,","//       repulsion: 2000,","//       gravity: true,","//       dt: 0.015","//     })","//     sys.renderer = Renderer(\"#sitemap\")","//     sys.graft(theUI)","","//     var nav = Nav(\"#nav\")","//     $(sys.renderer).bind('navigate', nav.navigate)","//     $(nav).bind('mode', sys.renderer.switchMode)","//     nav.init()","//   })","// })(this.jQuery)","","",""],"id":1},{"start":{"row":0,"column":0},"end":{"row":39,"column":37},"action":"insert","lines":["          var sys = arbor.ParticleSystem(1000, 400, 1);","                     sys.parameters({","                            gravity: true","                     });","","                     sys.renderer = Renderer(\"#sitemap\");","                     var data = {","                            nodes: {","                                   node1: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                          \"label\": \"Database Slides 1\",","                                          link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/1_ADV_Database%20Review.pdf\"","                                   },","                                   node2: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                          \"label\": \"Database Slides 2\",","                                          link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/2_Data%20Warehouse%20Concepts.pdf\"","","                                   },","                                   node3: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                          \"label\": \"Database Slides 3\",","                                          link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/3_Data%20Warehouse%20Design.pdf\"","","                                   },","                                   node4: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                          \"label\": \"Database Slides 4\",","                                          link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/_tower-git-client.pdf\"","","                                   },","                            },","                            edges: {}","","                     };","                     sys.graft(data);"]}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":10},"action":"remove","lines":["          "],"id":2,"ignore":true},{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""]},{"start":{"row":2,"column":0},"end":{"row":25,"column":36},"action":"remove","lines":["                     sys.parameters({","                            gravity: true","                     });","","                     sys.renderer = Renderer(\"#sitemap\");","                     var data = {","                            nodes: {","                                   node1: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                          \"label\": \"Database Slides 1\",","                                          link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/1_ADV_Database%20Review.pdf\"","                                   },","                                   node2: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                          \"label\": \"Database Slides 2\",","                                          link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/2_Data%20Warehouse%20Concepts.pdf\"","","                                   },","                                   node3: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                    "]},{"start":{"row":2,"column":0},"end":{"row":25,"column":0},"action":"insert","lines":["sys.parameters({","  gravity: true","});","","sys.renderer = Renderer(\"#sitemap\");","var data = {","  nodes: {","    node1: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",","      \"label\": \"Database Slides 1\",","      link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/1_ADV_Database%20Review.pdf\"","    },","    node2: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",","      \"label\": \"Database Slides 2\",","      link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/2_Data%20Warehouse%20Concepts.pdf\"","","    },","    node3: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",",""]},{"start":{"row":26,"column":0},"end":{"row":26,"column":36},"action":"remove","lines":["                                    "]},{"start":{"row":28,"column":4},"end":{"row":40,"column":21},"action":"remove","lines":["                               },","                                   node4: {","                                          \"color\": \"#007bff\",","                                          \"shape\": \"dot\",","                                          \"label\": \"Database Slides 4\",","                                          link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/_tower-git-client.pdf\"","","                                   },","                            },","                            edges: {}","","                     };","                     "]},{"start":{"row":28,"column":4},"end":{"row":40,"column":0},"action":"insert","lines":["},","    node4: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",","      \"label\": \"Database Slides 4\",","      link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/_tower-git-client.pdf\"","","    },","  },","  edges: {}","","};",""]}],[{"start":{"row":12,"column":33},"end":{"row":12,"column":34},"action":"insert","lines":["<"],"id":18}],[{"start":{"row":12,"column":34},"end":{"row":12,"column":35},"action":"insert","lines":[">"],"id":19}],[{"start":{"row":12,"column":34},"end":{"row":12,"column":35},"action":"insert","lines":["/"],"id":20}],[{"start":{"row":12,"column":35},"end":{"row":12,"column":36},"action":"insert","lines":["h"],"id":21}],[{"start":{"row":12,"column":36},"end":{"row":12,"column":37},"action":"insert","lines":["1"],"id":22}],[{"start":{"row":12,"column":16},"end":{"row":12,"column":17},"action":"insert","lines":["<"],"id":23}],[{"start":{"row":12,"column":17},"end":{"row":12,"column":18},"action":"insert","lines":[">"],"id":24}],[{"start":{"row":12,"column":17},"end":{"row":12,"column":18},"action":"insert","lines":["h"],"id":25}],[{"start":{"row":12,"column":18},"end":{"row":12,"column":19},"action":"insert","lines":["1"],"id":26}],[{"start":{"row":12,"column":16},"end":{"row":12,"column":20},"action":"remove","lines":["<h1>"],"id":27}],[{"start":{"row":12,"column":33},"end":{"row":12,"column":38},"action":"remove","lines":["</h1>"],"id":28}],[{"start":{"row":13,"column":13},"end":{"row":13,"column":106},"action":"remove","lines":["https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/1_ADV_Database%20Review.pdf"],"id":29},{"start":{"row":13,"column":13},"end":{"row":13,"column":14},"action":"insert","lines":["#"]}],[{"start":{"row":13,"column":14},"end":{"row":13,"column":15},"action":"insert","lines":["s"],"id":30}],[{"start":{"row":13,"column":15},"end":{"row":13,"column":16},"action":"insert","lines":["o"],"id":31}],[{"start":{"row":13,"column":16},"end":{"row":13,"column":17},"action":"insert","lines":["m"],"id":32}],[{"start":{"row":13,"column":17},"end":{"row":13,"column":18},"action":"insert","lines":["e"],"id":33}],[{"start":{"row":13,"column":18},"end":{"row":13,"column":19},"action":"insert","lines":["T"],"id":34}],[{"start":{"row":13,"column":19},"end":{"row":13,"column":20},"action":"insert","lines":["e"],"id":35}],[{"start":{"row":13,"column":14},"end":{"row":13,"column":20},"action":"remove","lines":["someTe"],"id":36},{"start":{"row":13,"column":14},"end":{"row":13,"column":22},"action":"insert","lines":["someText"]}],[{"start":{"row":0,"column":0},"end":{"row":40,"column":16},"action":"remove","lines":["","var sys = arbor.ParticleSystem(1000, 400, 1);","sys.parameters({","  gravity: true","});","","sys.renderer = Renderer(\"#sitemap\");","var data = {","  nodes: {","    node1: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",","      \"label\": \"Database Slides 1\",","      link: \"#someText\"","    },","    node2: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",","      \"label\": \"Database Slides 2\",","      link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/2_Data%20Warehouse%20Concepts.pdf\"","","    },","    node3: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",","      \"label\": \"Database Slides 3\",","      link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/3_Data%20Warehouse%20Design.pdf\"","","    },","    node4: {","      \"color\": \"#007bff\",","      \"shape\": \"dot\",","      \"label\": \"Database Slides 4\",","      link: \"https://papertrail-app-mctvltd.c9users.io/Dashboard.1/uploads/pdf/_tower-git-client.pdf\"","","    },","  },","  edges: {}","","};","sys.graft(data);"],"id":37}],[{"start":{"row":0,"column":0},"end":{"row":15,"column":25},"action":"insert","lines":["         var sys = arbor.ParticleSystem(1000, 400, 1);","         sys.parameters({","             gravity: true","         });","         ","         sys.renderer = Renderer(\"#tutorialExample\");","         var data = {","            nodes: {","               node1: {","                     \"color\": \"#faa21a\",","                     \"shape\": \"dot\",","                     \"label\": \" \"","                 }","             }","         };","         sys.graft(data);"],"id":38}],[{"start":{"row":0,"column":0},"end":{"row":0,"column":9},"action":"remove","lines":["         "],"id":39,"ignore":true},{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""]},{"start":{"row":2,"column":0},"end":{"row":2,"column":9},"action":"remove","lines":["         "]},{"start":{"row":3,"column":0},"end":{"row":3,"column":11},"action":"remove","lines":["           "]},{"start":{"row":4,"column":0},"end":{"row":6,"column":9},"action":"remove","lines":["         });","         ","         "]},{"start":{"row":4,"column":0},"end":{"row":6,"column":0},"action":"insert","lines":["});","",""]},{"start":{"row":7,"column":0},"end":{"row":7,"column":9},"action":"remove","lines":["         "]},{"start":{"row":8,"column":2},"end":{"row":9,"column":11},"action":"remove","lines":["          nodes: {","           "]},{"start":{"row":8,"column":2},"end":{"row":9,"column":0},"action":"insert","lines":["nodes: {",""]},{"start":{"row":10,"column":0},"end":{"row":10,"column":15},"action":"remove","lines":["               "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":15},"action":"remove","lines":["               "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":15},"action":"remove","lines":["               "]},{"start":{"row":13,"column":4},"end":{"row":16,"column":9},"action":"remove","lines":["             }","             }","         };","         "]},{"start":{"row":13,"column":4},"end":{"row":16,"column":0},"action":"insert","lines":["}","  }","};",""]}],[{"start":{"row":0,"column":0},"end":{"row":16,"column":16},"action":"remove","lines":["","var sys = arbor.ParticleSystem(1000, 400, 1);","sys.parameters({","  gravity: true","});","","sys.renderer = Renderer(\"#tutorialExample\");","var data = {","  nodes: {","    node1: {","      \"color\": \"#faa21a\",","      \"shape\": \"dot\",","      \"label\": \" \"","    }","  }","};","sys.graft(data);"],"id":40}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":0,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1540389080907,"hash":"da39a3ee5e6b4b0d3255bfef95601890afd80709"}