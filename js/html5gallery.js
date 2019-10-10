/** HTML5 Gallery - jQuery Image and Video Gallery Plugin
 * Copyright 2014 Magic Hills Pty Ltd All Rights Reserved
 * Website: http://html5box.com
 * Version 7.3
 */
(function() {
    for (var r = document.getElementsByTagName("script"), t = "", p = 0; p < r.length; p++) r[p].src && r[p].src.match(/html5gallery\.js/i) && (t = r[p].src.substr(0, r[p].src.lastIndexOf("/") + 1));
    r = !1;
    if ("undefined" == typeof jQuery) r = !0;
    else if (p = jQuery.fn.jquery.split("."), 1 > p[0] || 1 == p[0] && 6 > p[1]) r = !0;
    if (r) {
        var r = document.getElementsByTagName("head")[0],
            q = document.createElement("script");
        q.setAttribute("type", "text/javascript");
        q.readyState ? q.onreadystatechange = function() {
            if ("loaded" == q.readyState || "complete" ==
                q.readyState) q.onreadystatechange = null, loadHtml5Gallery(t)
        } : q.onload = function() {
            loadHtml5Gallery(t)
        };
        q.setAttribute("src", t + "jquery.js");
        r.appendChild(q)
    } else loadHtml5Gallery(t)
})();

function loadHtml5Gallery(r) {
    jQuery.easing.jswing = jQuery.easing.swing;
    jQuery.extend(jQuery.easing, {
        def: "easeOutQuad",
        swing: function(b, e, a, d, c) {
            return jQuery.easing[jQuery.easing.def](b, e, a, d, c)
        },
        easeInQuad: function(b, e, a, d, c) {
            return d * (e /= c) * e + a
        },
        easeOutQuad: function(b, e, a, d, c) {
            return -d * (e /= c) * (e - 2) + a
        },
        easeInOutQuad: function(b, e, a, d, c) {
            return 1 > (e /= c / 2) ? d / 2 * e * e + a : -d / 2 * (--e * (e - 2) - 1) + a
        },
        easeInCubic: function(b, e, a, d, c) {
            return d * (e /= c) * e * e + a
        },
        easeOutCubic: function(b, e, a, d, c) {
            return d * ((e = e / c - 1) * e * e + 1) +
                a
        },
        easeInOutCubic: function(b, e, a, d, c) {
            return 1 > (e /= c / 2) ? d / 2 * e * e * e + a : d / 2 * ((e -= 2) * e * e + 2) + a
        },
        easeInQuart: function(b, e, a, d, c) {
            return d * (e /= c) * e * e * e + a
        },
        easeOutQuart: function(b, e, a, d, c) {
            return -d * ((e = e / c - 1) * e * e * e - 1) + a
        },
        easeInOutQuart: function(b, e, a, d, c) {
            return 1 > (e /= c / 2) ? d / 2 * e * e * e * e + a : -d / 2 * ((e -= 2) * e * e * e - 2) + a
        },
        easeInQuint: function(b, e, a, d, c) {
            return d * (e /= c) * e * e * e * e + a
        },
        easeOutQuint: function(b, e, a, d, c) {
            return d * ((e = e / c - 1) * e * e * e * e + 1) + a
        },
        easeInOutQuint: function(b, e, a, d, c) {
            return 1 > (e /= c / 2) ? d / 2 * e * e * e * e * e + a : d /
                2 * ((e -= 2) * e * e * e * e + 2) + a
        },
        easeInSine: function(b, e, a, d, c) {
            return -d * Math.cos(e / c * (Math.PI / 2)) + d + a
        },
        easeOutSine: function(b, e, a, d, c) {
            return d * Math.sin(e / c * (Math.PI / 2)) + a
        },
        easeInOutSine: function(b, e, a, d, c) {
            return -d / 2 * (Math.cos(Math.PI * e / c) - 1) + a
        },
        easeInExpo: function(b, e, a, d, c) {
            return 0 == e ? a : d * Math.pow(2, 10 * (e / c - 1)) + a
        },
        easeOutExpo: function(b, e, a, d, c) {
            return e == c ? a + d : d * (-Math.pow(2, -10 * e / c) + 1) + a
        },
        easeInOutExpo: function(b, e, a, d, c) {
            return 0 == e ? a : e == c ? a + d : 1 > (e /= c / 2) ? d / 2 * Math.pow(2, 10 * (e - 1)) + a : d / 2 * (-Math.pow(2, -10 * --e) + 2) + a
        },
        easeInCirc: function(b, e, a, d, c) {
            return -d * (Math.sqrt(1 - (e /= c) * e) - 1) + a
        },
        easeOutCirc: function(b, e, a, d, c) {
            return d * Math.sqrt(1 - (e = e / c - 1) * e) + a
        },
        easeInOutCirc: function(b, e, a, d, c) {
            return 1 > (e /= c / 2) ? -d / 2 * (Math.sqrt(1 - e * e) - 1) + a : d / 2 * (Math.sqrt(1 - (e -= 2) * e) + 1) + a
        },
        easeInElastic: function(b, e, a, d, c) {
            b = 1.70158;
            var l = 0,
                f = d;
            if (0 == e) return a;
            if (1 == (e /= c)) return a + d;
            l || (l = 0.3 * c);
            f < Math.abs(d) ? (f = d, b = l / 4) : b = l / (2 * Math.PI) * Math.asin(d / f);
            return -(f * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * c - b) * 2 * Math.PI / l)) + a
        },
        easeOutElastic: function(b,
            e, a, d, c) {
            b = 1.70158;
            var l = 0,
                f = d;
            if (0 == e) return a;
            if (1 == (e /= c)) return a + d;
            l || (l = 0.3 * c);
            f < Math.abs(d) ? (f = d, b = l / 4) : b = l / (2 * Math.PI) * Math.asin(d / f);
            return f * Math.pow(2, -10 * e) * Math.sin((e * c - b) * 2 * Math.PI / l) + d + a
        },
        easeInOutElastic: function(b, e, a, d, c) {
            b = 1.70158;
            var l = 0,
                f = d;
            if (0 == e) return a;
            if (2 == (e /= c / 2)) return a + d;
            l || (l = c * 0.3 * 1.5);
            f < Math.abs(d) ? (f = d, b = l / 4) : b = l / (2 * Math.PI) * Math.asin(d / f);
            return 1 > e ? -0.5 * f * Math.pow(2, 10 * (e -= 1)) * Math.sin((e * c - b) * 2 * Math.PI / l) + a : 0.5 * f * Math.pow(2, -10 * (e -= 1)) * Math.sin((e * c - b) * 2 * Math.PI /
                l) + d + a
        },
        easeInBack: function(b, e, a, d, c, l) {
            void 0 == l && (l = 1.70158);
            return d * (e /= c) * e * ((l + 1) * e - l) + a
        },
        easeOutBack: function(b, e, a, d, c, l) {
            void 0 == l && (l = 1.70158);
            return d * ((e = e / c - 1) * e * ((l + 1) * e + l) + 1) + a
        },
        easeInOutBack: function(b, e, a, d, c, l) {
            void 0 == l && (l = 1.70158);
            return 1 > (e /= c / 2) ? d / 2 * e * e * (((l *= 1.525) + 1) * e - l) + a : d / 2 * ((e -= 2) * e * (((l *= 1.525) + 1) * e + l) + 2) + a
        },
        easeInBounce: function(b, e, a, d, c) {
            return d - jQuery.easing.easeOutBounce(b, c - e, 0, d, c) + a
        },
        easeOutBounce: function(b, e, a, d, c) {
            return (e /= c) < 1 / 2.75 ? d * 7.5625 * e * e + a : e < 2 /
                2.75 ? d * (7.5625 * (e -= 1.5 / 2.75) * e + 0.75) + a : e < 2.5 / 2.75 ? d * (7.5625 * (e -= 2.25 / 2.75) * e + 0.9375) + a : d * (7.5625 * (e -= 2.625 / 2.75) * e + 0.984375) + a
        },
        easeInOutBounce: function(b, e, a, d, c) {
            return e < c / 2 ? 0.5 * jQuery.easing.easeInBounce(b, 2 * e, 0, d, c) + a : 0.5 * jQuery.easing.easeOutBounce(b, 2 * e - c, 0, d, c) + 0.5 * d + a
        }
    });
    var t = jQuery;
    t.fn.touchSwipe = function(b) {
        var e = {
            preventWebBrowser: !1,
            swipeLeft: null,
            swipeRight: null,
            swipeTop: null,
            swipeBottom: null
        };
        b && t.extend(e, b);
        return this.each(function() {
            function a(a) {
                var b = a.originalEvent;
                1 <= b.targetTouches.length ?
                    (f = b.targetTouches[0].pageX, h = b.targetTouches[0].pageY) : l(a)
            }

            function b(a) {
                e.preventWebBrowser && a.preventDefault();
                var c = a.originalEvent;
                1 <= c.targetTouches.length ? (j = c.targetTouches[0].pageX, g = c.targetTouches[0].pageY) : l(a)
            }

            function c(a) {
                if (0 < j || 0 < g) 100 < Math.abs(j - f) && (j > f ? e.swipeRight && e.swipeRight.call() : e.swipeLeft && e.swipeLeft.call()), 100 < Math.abs(g - h) && (g > h ? e.swipeBottom && e.swipeBottom.call() : e.swipeTop && e.swipeTop.call());
                l(a)
            }

            function l() {
                g = j = h = f = -1
            }
            var f = -1,
                h = -1,
                j = -1,
                g = -1;
            try {
                t(this).bind("touchstart",
                    a), t(this).bind("touchmove", b), t(this).bind("touchend", c), t(this).bind("touchcancel", l)
            } catch (O) {}
        })
    };
    var p = jQuery;
    p.fn.drag = function(b, e, a) {
        var d = "string" == typeof b ? b : "",
            c = p.isFunction(b) ? b : p.isFunction(e) ? e : null;
        0 !== d.indexOf("drag") && (d = "drag" + d);
        a = (b == c ? e : a) || {};
        return c ? this.bind(d, a, c) : this.trigger(d)
    };
    var q = p.event,
        v = q.special,
        n = null,
        n = v.drag = {
            defaults: {
                which: 1,
                distance: 0,
                not: ":input",
                handle: null,
                relative: !1,
                drop: !0,
                click: !1
            },
            datakey: "dragdata",
            livekey: "livedrag",
            add: function(b) {
                var e = p.data(this,
                        n.datakey),
                    a = b.data || {};
                e.related += 1;
                !e.live && b.selector && (e.live = !0, q.add(this, "draginit." + n.livekey, n.delegate));
                p.each(n.defaults, function(b) {
                    void 0 !== a[b] && (e[b] = a[b])
                })
            },
            remove: function() {
                p.data(this, n.datakey).related -= 1
            },
            setup: function() {
                if (!p.data(this, n.datakey)) {
                    var b = p.extend({
                        related: 0
                    }, n.defaults);
                    p.data(this, n.datakey, b);
                    q.add(this, "mousedown", n.init, b);
                    this.attachEvent && this.attachEvent("ondragstart", n.dontstart)
                }
            },
            teardown: function() {
                p.data(this, n.datakey).related || (p.removeData(this,
                    n.datakey), q.remove(this, "mousedown", n.init), q.remove(this, "draginit", n.delegate), n.textselect(!0), this.detachEvent && this.detachEvent("ondragstart", n.dontstart))
            },
            init: function(b) {
                var e = b.data,
                    a;
                if (!(0 < e.which && b.which != e.which) && !p(b.target).is(e.not) && (!e.handle || p(b.target).closest(e.handle, b.currentTarget).length))
                    if (e.propagates = 1, e.interactions = [n.interaction(this, e)], e.target = b.target, e.pageX = b.pageX, e.pageY = b.pageY, e.dragging = null, a = n.hijack(b, "draginit", e), e.propagates) {
                        if ((a = n.flatten(a)) &&
                            a.length) e.interactions = [], p.each(a, function() {
                            e.interactions.push(n.interaction(this, e))
                        });
                        e.propagates = e.interactions.length;
                        !1 !== e.drop && v.drop && v.drop.handler(b, e);
                        n.textselect(!1);
                        q.add(document, "mousemove mouseup", n.handler, e);
                        return !1
                    }
            },
            interaction: function(b, e) {
                return {
                    drag: b,
                    callback: new n.callback,
                    droppable: [],
                    offset: p(b)[e.relative ? "position" : "offset"]() || {
                        top: 0,
                        left: 0
                    }
                }
            },
            handler: function(b) {
                var e = b.data;
                switch (b.type) {
                    case !e.dragging && "mousemove":
                        if (Math.pow(b.pageX - e.pageX, 2) + Math.pow(b.pageY -
                                e.pageY, 2) < Math.pow(e.distance, 2)) break;
                        b.target = e.target;
                        n.hijack(b, "dragstart", e);
                        e.propagates && (e.dragging = !0);
                    case "mousemove":
                        if (e.dragging) {
                            n.hijack(b, "drag", e);
                            if (e.propagates) {
                                !1 !== e.drop && v.drop && v.drop.handler(b, e);
                                break
                            }
                            b.type = "mouseup"
                        }
                    case "mouseup":
                        q.remove(document, "mousemove mouseup", n.handler), e.dragging && (!1 !== e.drop && v.drop && v.drop.handler(b, e), n.hijack(b, "dragend", e)), n.textselect(!0), !1 === e.click && e.dragging && (jQuery.event.triggered = !0, setTimeout(function() {
                            jQuery.event.triggered = !1
                        }, 20), e.dragging = !1)
                }
            },
            delegate: function(b) {
                var e = [],
                    a, d = p.data(this, "events") || {};
                p.each(d.live || [], function(c, d) {
                    if (0 === d.preType.indexOf("drag") && (a = p(b.target).closest(d.selector, b.currentTarget)[0])) q.add(a, d.origType + "." + n.livekey, d.origHandler, d.data), 0 > p.inArray(a, e) && e.push(a)
                });
                return !e.length ? !1 : p(e).bind("dragend." + n.livekey, function() {
                    q.remove(this, "." + n.livekey)
                })
            },
            hijack: function(b, e, a, d, c) {
                if (a) {
                    var l = b.originalEvent,
                        f = b.type,
                        h = e.indexOf("drop") ? "drag" : "drop",
                        j, g = d || 0,
                        u, k;
                    d = !isNaN(d) ?
                        d : a.interactions.length;
                    b.type = e;
                    b.originalEvent = null;
                    a.results = [];
                    do
                        if ((u = a.interactions[g]) && !("dragend" !== e && u.cancelled)) k = n.properties(b, a, u), u.results = [], p(c || u[h] || a.droppable).each(function(c, d) {
                                j = (k.target = d) ? q.handle.call(d, b, k) : null;
                                !1 === j ? ("drag" == h && (u.cancelled = !0, a.propagates -= 1), "drop" == e && (u[h][c] = null)) : "dropinit" == e && u.droppable.push(n.element(j) || d);
                                "dragstart" == e && (u.proxy = p(n.element(j) || u.drag)[0]);
                                u.results.push(j);
                                delete b.result;
                                if ("dropinit" !== e) return j
                            }), a.results[g] =
                            n.flatten(u.results), "dropinit" == e && (u.droppable = n.flatten(u.droppable)), "dragstart" == e && !u.cancelled && k.update();
                    while (++g < d);
                    b.type = f;
                    b.originalEvent = l;
                    return n.flatten(a.results)
                }
            },
            properties: function(b, e, a) {
                var d = a.callback;
                d.drag = a.drag;
                d.proxy = a.proxy || a.drag;
                d.startX = e.pageX;
                d.startY = e.pageY;
                d.deltaX = b.pageX - e.pageX;
                d.deltaY = b.pageY - e.pageY;
                d.originalX = a.offset.left;
                d.originalY = a.offset.top;
                d.offsetX = b.pageX - (e.pageX - d.originalX);
                d.offsetY = b.pageY - (e.pageY - d.originalY);
                d.drop = n.flatten((a.drop || []).slice());
                d.available = n.flatten((a.droppable || []).slice());
                return d
            },
            element: function(b) {
                if (b && (b.jquery || 1 == b.nodeType)) return b
            },
            flatten: function(b) {
                return p.map(b, function(b) {
                    return b && b.jquery ? p.makeArray(b) : b && b.length ? n.flatten(b) : b
                })
            },
            textselect: function(b) {
                p(document)[b ? "unbind" : "bind"]("selectstart", n.dontstart).attr("unselectable", b ? "off" : "on").css("MozUserSelect", b ? "" : "none")
            },
            dontstart: function() {
                return !1
            },
            callback: function() {}
        };
    n.callback.prototype = {
        update: function() {
            v.drop && this.available.length &&
                p.each(this.available, function(b) {
                    v.drop.locate(this, b)
                })
        }
    };
    v.draginit = v.dragstart = v.dragend = n;
    var x = jQuery;
    x.fn.html5boxTransition = function(b, e, a, d, c) {
        $parent = this;
        b = d.effect;
        var l = d.easing,
            f = d.duration,
            h = d.direction,
            j = null;
        b && (b = b.split(","), j = b[Math.floor(Math.random() * b.length)], j = x.trim(j.toLowerCase()));
        j && d[j] && ("duration" in d[j] && (f = d[j].duration), d[j].easing && (l = d[j].easing));
        "fade" == j || "fadein" == j ? (a.hide(), e.insertBefore(a), a.fadeIn(f, l, function() {
                e.remove();
                c()
            })) : "fadeout" == j ? (a.show(),
                e.fadeOut(f, l, function() {
                    e.remove();
                    c()
                })) : "fadeinout" == j ? (a.hide(), e.insertBefore(a), e.fadeOut(f, l), a.fadeIn(f, l, function() {
                e.remove();
                c()
            })) : "crossfade" == j ? (a.hide(), e.fadeOut(f / 2, l, function() {
                a.fadeIn(f / 2, l, function() {
                    e.remove();
                    c()
                })
            })) : "slide" == j ? ($parent.css({
                overflow: "hidden"
            }), h ? (a.css({
                left: "100%"
            }), a.animate({
                left: "0%"
            }, f, l), e.animate({
                left: "-100%"
            }, f, l, function() {
                e.remove();
                c()
            })) : (a.css({
                left: "-100%"
            }), a.animate({
                left: "0%"
            }, f, l), e.animate({
                left: "100%"
            }, f, l, function() {
                e.remove();
                c()
            }))) :
            (a.show(), e.remove(), c())
    };
    var k = jQuery;
    k.fn.addHTML5VideoControls = function(b, e) {
        var a = "ontouchstart" in window,
            d = a ? "touchstart" : "mousedown",
            c = a ? "touchmove" : "mousemove",
            l = a ? "touchcancel" : "mouseup",
            f = a ? "touchstart" : "click",
            h = a ? 48 : 36,
            j = null,
            g = null,
            u = !1,
            n = !0,
            p = null != navigator.userAgent.match(/iPod/i) || null != navigator.userAgent.match(/iPhone/i),
            r = k(this).data("ishd"),
            q = k(this).data("hd"),
            t = k(this).data("src"),
            m = k(this);
        m.get(0).removeAttribute("controls");
        if (p) {
            var v = m.height() - h;
            m.css({
                height: v
            })
        }
        var z =
            k("<div class='html5boxVideoPlay'></div>");
        p || (m.after(z), z.css({
            position: "absolute",
            top: "50%",
            left: "50%",
            display: "block",
            cursor: "pointer",
            width: 64,
            height: 64,
            "margin-left": -32,
            "margin-top": -32,
            "background-image": "url('" + b + "html5boxplayer_playvideo.png')",
            "background-position": "center center",
            "background-repeat": "no-repeat"
        }).bind(f, function() {
            m.get(0).play()
        }));
        var B = k("<div class='html5boxVideoFullscreenBg'></div>"),
            s = k("<div class='html5boxVideoControls'><div class='html5boxVideoControlsBg'></div><div class='html5boxPlayPause'><div class='html5boxPlay'></div><div class='html5boxPause'></div></div><div class='html5boxTimeCurrent'>--:--</div><div class='html5boxFullscreen'></div><div class='html5boxHD'></div><div class='html5boxVolume'><div class='html5boxVolumeButton'></div><div class='html5boxVolumeBar'><div class='html5boxVolumeBarBg'><div class='html5boxVolumeBarActive'></div></div></div></div><div class='html5boxTimeTotal'>--:--</div><div class='html5boxSeeker'><div class='html5boxSeekerBuffer'></div><div class='html5boxSeekerPlay'></div><div class='html5boxSeekerHandler'></div></div><div style='clear:both;'></div></div>");
        m.after(s);
        m.after(B);
        B.css({
            display: "none",
            position: "fixed",
            left: 0,
            top: 0,
            bottom: 0,
            right: 0,
            "z-index": 2147483647
        });
        s.css({
            display: "block",
            position: "absolute",
            width: "100%",
            height: h,
            left: 0,
            bottom: 0
        });
        var K = function() {
            n = !0
        };
        m.bind(f, function() {
            n = !0
        }).hover(function() {
            n = !0
        }, function() {
            n = !1
        });
        setInterval(function() {
            n && (s.show(), n = !1, clearTimeout(j), j = setTimeout(function() {
                m.get(0).paused || s.fadeOut()
            }, 5E3))
        }, 250);
        k(".html5boxVideoControlsBg", s).css({
            display: "block",
            position: "absolute",
            width: "100%",
            height: "100%",
            left: 0,
            top: 0,
            "background-color": "#000000",
            opacity: 0.7,
            filter: "alpha(opacity=70)"
        });
        k(".html5boxPlayPause", s).css({
            display: "block",
            position: "relative",
            width: "32px",
            height: "32px",
            margin: Math.floor((h - 32) / 2),
            "float": "left"
        });
        var C = k(".html5boxPlay", s),
            D = k(".html5boxPause", s);
        C.css({
            display: "block",
            position: "absolute",
            top: 0,
            left: 0,
            width: "32px",
            height: "32px",
            cursor: "pointer",
            "background-image": "url('" + b + "html5boxplayer_playpause.png')",
            "background-position": "top left"
        }).hover(function() {
                k(this).css({
                    "background-position": "bottom left"
                })
            },
            function() {
                k(this).css({
                    "background-position": "top left"
                })
            }).bind(f, function() {
            m.get(0).play()
        });
        D.css({
            display: "none",
            position: "absolute",
            top: 0,
            left: 0,
            width: "32px",
            height: "32px",
            cursor: "pointer",
            "background-image": "url('" + b + "html5boxplayer_playpause.png')",
            "background-position": "top right"
        }).hover(function() {
            k(this).css({
                "background-position": "bottom right"
            })
        }, function() {
            k(this).css({
                "background-position": "top right"
            })
        }).bind(f, function() {
            m.get(0).pause()
        });
        var L = k(".html5boxTimeCurrent", s),
            x = k(".html5boxTimeTotal",
                s),
            w = k(".html5boxSeeker", s),
            G = k(".html5boxSeekerPlay", s),
            A = k(".html5boxSeekerBuffer", s),
            N = k(".html5boxSeekerHandler", s);
        L.css({
            display: "block",
            position: "relative",
            "float": "left",
            "line-height": h + "px",
            "font-weight": "normal",
            "font-size": "12px",
            margin: "0 8px",
            "font-family": "Arial, Helvetica, sans-serif",
            color: "#fff"
        });
        x.css({
            display: "block",
            position: "relative",
            "float": "right",
            "line-height": h + "px",
            "font-weight": "normal",
            "font-size": "12px",
            margin: "0 8px",
            "font-family": "Arial, Helvetica, sans-serif",
            color: "#fff"
        });
        w.css({
            display: "block",
            cursor: "pointer",
            overflow: "hidden",
            position: "relative",
            height: "10px",
            "background-color": "#222",
            margin: Math.floor((h - 10) / 2) + "px 4px"
        }).bind(d, function(b) {
            b = (a ? b.originalEvent.touches[0] : b).pageX - w.offset().left;
            G.css({
                width: b
            });
            m.get(0).currentTime = b * m.get(0).duration / w.width();
            w.bind(c, function(b) {
                b = (a ? b.originalEvent.touches[0] : b).pageX - w.offset().left;
                G.css({
                    width: b
                });
                m.get(0).currentTime = b * m.get(0).duration / w.width()
            })
        }).bind(l, function() {
            w.unbind(c)
        });
        A.css({
            display: "block",
            position: "absolute",
            left: 0,
            top: 0,
            height: "100%",
            "background-color": "#444"
        });
        G.css({
            display: "block",
            position: "absolute",
            left: 0,
            top: 0,
            height: "100%",
            "background-color": "#fcc500"
        });
        if (!p && (m.get(0).requestFullscreen || m.get(0).webkitRequestFullScreen || m.get(0).mozRequestFullScreen || m.get(0).webkitEnterFullScreen || m.get(0).msRequestFullscreen)) {
            var I = function(a) {
                s.css({
                    position: a ? "fixed" : "absolute"
                });
                var b = E.css("background-position") ? E.css("background-position").split(" ")[1] : E.css("background-position-y");
                E.css({
                    "background-position": (a ? "right" : "left") + " " + b
                });
                B.css({
                    display: a ? "block" : "none"
                });
                a ? (k(document).bind("mousemove", K), s.css({
                    "z-index": 2147483647
                })) : (k(document).unbind("mousemove", K), s.css({
                    "z-index": ""
                }))
            };
            document.addEventListener("fullscreenchange", function() {
                u = document.fullscreen;
                I(document.fullscreen)
            }, !1);
            document.addEventListener("mozfullscreenchange", function() {
                u = document.mozFullScreen;
                I(document.mozFullScreen)
            }, !1);
            document.addEventListener("webkitfullscreenchange", function() {
                u = document.webkitIsFullScreen;
                I(document.webkitIsFullScreen)
            }, !1);
            m.get(0).addEventListener("webkitbeginfullscreen", function() {
                u = !0
            }, !1);
            m.get(0).addEventListener("webkitendfullscreen", function() {
                u = !1
            }, !1);
            k("head").append("<style type='text/css'>video::-webkit-media-controls { display:none !important; }</style>");
            var E = k(".html5boxFullscreen", s);
            E.css({
                display: "block",
                position: "relative",
                "float": "right",
                width: "32px",
                height: "32px",
                margin: Math.floor((h - 32) / 2),
                cursor: "pointer",
                "background-image": "url('" + b + "html5boxplayer_fullscreen.png')",
                "background-position": "left top"
            }).hover(function() {
                var a = k(this).css("background-position") ? k(this).css("background-position").split(" ")[0] : k(this).css("background-position-x");
                k(this).css({
                    "background-position": a + " bottom"
                })
            }, function() {
                var a = k(this).css("background-position") ? k(this).css("background-position").split(" ")[0] : k(this).css("background-position-x");
                k(this).css({
                    "background-position": a + " top"
                })
            }).bind(f, function() {
                (u = !u) ? (m.get(0).requestFullscreen ? m.get(0).requestFullscreen() : m.get(0).webkitRequestFullScreen ?
                    m.get(0).webkitRequestFullScreen() : m.get(0).mozRequestFullScreen ? m.get(0).mozRequestFullScreen() : m.get(0).webkitEnterFullScreen && m.get(0).webkitEnterFullScreen(), m.get(0).msRequestFullscreen && m.get(0).msRequestFullscreen()) : document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen ? document.webkitCancelFullScreen() : document.webkitExitFullscreen ? document.webkitExitFullscreen() : document.msExitFullscreen && document.msExitFullscreen()
            })
        }
        q &&
            k(".html5boxHD", s).css({
                display: "block",
                position: "relative",
                "float": "right",
                width: "32px",
                height: "32px",
                margin: Math.floor((h - 32) / 2),
                cursor: "pointer",
                "background-image": "url('" + b + "html5boxplayer_hd.png')",
                "background-position": (r ? "right" : "left") + " center"
            }).bind(f, function() {
                r = !r;
                k(this).css({
                    "background-position": (r ? "right" : "left") + " center"
                });
                e.isHd = r;
                var a = m.get(0).isPaused;
                m.get(0).setAttribute("src", (r ? q : t) + "#t=" + m.get(0).currentTime);
                a ? p || m.get(0).pause() : m.get(0).play()
            });
        v = m.get(0).volume;
        m.get(0).volume =
            v / 2 + 0.1;
        if (m.get(0).volume === v / 2 + 0.1) {
            m.get(0).volume = v;
            var v = k(".html5boxVolume", s),
                H = k(".html5boxVolumeButton", s),
                J = k(".html5boxVolumeBar", s),
                y = k(".html5boxVolumeBarBg", s),
                F = k(".html5boxVolumeBarActive", s);
            v.css({
                display: "block",
                position: "relative",
                "float": "right",
                width: "32px",
                height: "32px",
                margin: Math.floor((h - 32) / 2)
            }).hover(function() {
                clearTimeout(g);
                var a = m.get(0).volume;
                F.css({
                    height: Math.round(100 * a) + "%"
                });
                J.show()
            }, function() {
                clearTimeout(g);
                g = setTimeout(function() {
                    J.hide()
                }, 1E3)
            });
            H.css({
                display: "block",
                position: "absolute",
                top: 0,
                left: 0,
                width: "32px",
                height: "32px",
                cursor: "pointer",
                "background-image": "url('" + b + "html5boxplayer_volume.png')",
                "background-position": "top left"
            }).hover(function() {
                var a = k(this).css("background-position") ? k(this).css("background-position").split(" ")[0] : k(this).css("background-position-x");
                k(this).css({
                    "background-position": a + " bottom"
                })
            }, function() {
                var a = k(this).css("background-position") ? k(this).css("background-position").split(" ")[0] : k(this).css("background-position-x");
                k(this).css({
                    "background-position": a + " top"
                })
            }).bind(f, function() {
                var a = m.get(0).volume;
                0 < a ? (volumeSaved = a, a = 0) : a = volumeSaved;
                var b = k(this).css("background-position") ? k(this).css("background-position").split(" ")[1] : k(this).css("background-position-y");
                H.css({
                    "background-position": (0 < a ? "left" : "right") + " " + b
                });
                m.get(0).volume = a;
                F.css({
                    height: Math.round(100 * a) + "%"
                })
            });
            J.css({
                display: "none",
                position: "absolute",
                left: 4,
                bottom: "100%",
                width: 24,
                height: 80,
                "margin-bottom": Math.floor((h - 32) / 2),
                "background-color": "#000000",
                opacity: 0.7,
                filter: "alpha(opacity=70)"
            });
            y.css({
                display: "block",
                position: "relative",
                width: 10,
                height: 68,
                margin: 7,
                cursor: "pointer",
                "background-color": "#222"
            });
            F.css({
                display: "block",
                position: "absolute",
                bottom: 0,
                left: 0,
                width: "100%",
                height: "100%",
                "background-color": "#fcc500"
            });
            y.bind(d, function(b) {
                b = 1 - ((a ? b.originalEvent.touches[0] : b).pageY - y.offset().top) / y.height();
                b = 1 < b ? 1 : 0 > b ? 0 : b;
                F.css({
                    height: Math.round(100 * b) + "%"
                });
                H.css({
                    "background-position": "left " + (0 < b ? "top" : "bottom")
                });
                m.get(0).volume = b;
                y.bind(c,
                    function(b) {
                        b = 1 - ((a ? b.originalEvent.touches[0] : b).pageY - y.offset().top) / y.height();
                        b = 1 < b ? 1 : 0 > b ? 0 : b;
                        F.css({
                            height: Math.round(100 * b) + "%"
                        });
                        H.css({
                            "background-position": "left " + (0 < b ? "top" : "bottom")
                        });
                        m.get(0).volume = b
                    })
            }).bind(l, function() {
                y.unbind(c)
            })
        }
        var M = function(a) {
                var b = Math.floor(a / 3600),
                    c = Math.floor((a - 60 * b) / 60);
                a = Math.floor(a - (3600 * b + 60 * c));
                c = (10 > c ? "0" + c : c) + ":" + (10 > a ? "0" + a : a);
                0 < b && (c = (10 > b ? "0" + b : b) + ":" + c);
                return c
            },
            d = function() {
                s.show();
                clearTimeout(j);
                z.show();
                C.show();
                D.hide()
            },
            l = function() {
                var a =
                    m.get(0).currentTime;
                if (a) {
                    L.text(M(a));
                    var b = m.get(0).duration;
                    if (b) {
                        x.text(M(b));
                        var c = w.width(),
                            a = Math.round(c * a / b);
                        G.css({
                            width: a
                        });
                        N.css({
                            left: a
                        })
                    }
                }
            },
            f = function() {
                if (m.get(0).buffered && 0 < m.get(0).buffered.length && !isNaN(m.get(0).buffered.end(0)) && !isNaN(m.get(0).duration)) {
                    var a = w.width();
                    A.css({
                        width: Math.round(a * m.get(0).buffered.end(0) / m.get(0).duration)
                    })
                }
            };
        try {
            m.bind("play", function() {
                z.hide();
                C.hide();
                D.show()
            }), m.bind("pause", d), m.bind("ended", d), m.bind("timeupdate", l), m.bind("progress",
                f)
        } catch (P) {}
    };
    var b = jQuery,
        A = 0;
    b.fn.html5gallery = function(k) {
        var e = function(a, d, c) {
            this.container = a;
            this.options = d;
            this.id = c;
            this.options.flashInstalled = !1;
            try {
                new ActiveXObject("ShockwaveFlash.ShockwaveFlash") && (this.options.flashInstalled = !0)
            } catch (e) {
                navigator.mimeTypes["application/x-shockwave-flash"] && (this.options.flashInstalled = !0)
            }
            this.options.html5VideoSupported = !!document.createElement("video").canPlayType;
            this.options.isChrome = null != navigator.userAgent.match(/Chrome/i);
            this.options.isFirefox =
                null != navigator.userAgent.match(/Firefox/i);
            this.options.isOpera = null != navigator.userAgent.match(/Opera/i) || null != navigator.userAgent.match(/OPR\//i);
            this.options.isSafari = null != navigator.userAgent.match(/Safari/i);
            this.options.isIE11 = null != navigator.userAgent.match(/Trident\/7/) && null != navigator.userAgent.match(/rv:11/);
            this.options.isIE = null != navigator.userAgent.match(/MSIE/i) && !this.options.isOpera;
            this.options.isIE10 = null != navigator.userAgent.match(/MSIE 10/i) && !this.options.isOpera;
            this.options.isIE9 =
                null != navigator.userAgent.match(/MSIE 9/i) && !this.options.isOpera;
            this.options.isIE8 = null != navigator.userAgent.match(/MSIE 8/i) && !this.options.isOpera;
            this.options.isIE7 = null != navigator.userAgent.match(/MSIE 7/i) && !this.options.isOpera;
            this.options.isIE6 = null != navigator.userAgent.match(/MSIE 6/i) && !this.options.isOpera;
            this.options.isIE678 = this.options.isIE6 || this.options.isIE7 || this.options.isIE8;
            this.options.isIE6789 = this.options.isIE6 || this.options.isIE7 || this.options.isIE8 || this.options.isIE9;
            this.options.isAndroid = null != navigator.userAgent.match(/Android/i);
            this.options.isIPad = null != navigator.userAgent.match(/iPad/i);
            this.options.isIPhone = null != navigator.userAgent.match(/iPod/i) || null != navigator.userAgent.match(/iPhone/i);
            this.options.isIOS = this.options.isIPad || this.options.isIPhone;
            this.options.isMobile = this.options.isAndroid || this.options.isIPad || this.options.isIPhone;
            this.options.isIOSLess5 = this.options.isIPad && this.options.isIPhone && (null != navigator.userAgent.match(/OS 4/i) || null !=
                navigator.userAgent.match(/OS 3/i));
            this.options.supportCSSPositionFixed = !this.options.isIE6 && !this.options.isIOSLess5;
            this.eStart = (this.isTouch = "ontouchstart" in window) ? "touchstart" : "mousedown";
            this.eMove = this.isTouch ? "touchmove" : "mousemove";
            this.eCancel = this.isTouch ? "touchcancel" : "mouseup";
            this.eClick = this.isTouch ? "touchstart" : "click";
            this.slideTimer = this.slideshowTimeout = null;
            this.looptimes = this.slideTimerCount = 0;
            this.updateCarouselTimeout = null;
            this.disableupdatecarousel = !1;
            this.hideToolboxTimeout =
                this.hideTitleTimeout = null;
            this.isHd = this.options.hddefault;
            this.isHTML5 = !1;
            this.elemArray = [];
            b(".html5gallery-loading").hide();
            this.container.children().hide();
            this.container.css({
                display: "block",
                position: "relative"
            });
            this.options.googlefonts && 0 < this.options.googlefonts.length && (a = ("https:" == document.location.protocol ? "https" : "http") + "://fonts.googleapis.com/css?family=" + this.options.googlefonts, d = document.createElement("link"), d.setAttribute("rel", "stylesheet"), d.setAttribute("type", "text/css"),
                d.setAttribute("href", a), document.getElementsByTagName("head")[0].appendChild(d));
            this.initData(this.processElemArray)
        };
        e.prototype = {
            getParams: function() {
                for (var a = {}, b = window.location.search.substring(1).split("&"), c = 0; c < b.length; c++) {
                    var e = b[c].split("=");
                    e && 2 == e.length && (a[e[0].toLowerCase()] = unescape(e[1]))
                }
                return a
            },
            init: function(a) {
                if (a.options.random)
                    for (var d = a.elemArray.length - 1; 0 < d; d--) {
                        var c = Math.floor(Math.random() * d),
                            e = a.elemArray[d];
                        a.elemArray[d] = a.elemArray[c];
                        a.elemArray[c] = e
                    }
                a.initYoutubeApi();
                a.options.showcarousel = 1 < a.elemArray.length && a.options.showcarousel;
                a.options.watermarkcode = "";
                a.options.fv ? a.options.watermarkcode = "<a style='text-decoration:none;' target='_blank' href='#' >" : 0 < a.options.watermarklink.length && (a.options.watermarkcode = "<a style='text-decoration:none;' target='_blank' href='#' >");
                a.options.watermarkcode += "<div " + (a.options.fv ? "" : "class='html5gallery-watermark-" + a.id + "' ") + "style='" + (a.options.fv ? "display:none;position:absolute;top:10px;left:10px;width:170px;height:18px;line-height:18px;text-align:center;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;background-color:#fff;color:#333;font-size:12px;font-family:Arial,Helvetica,sans-serif;" :
                    0 < a.options.watermark.length ? "display:block;position:absolute;top:0px;left:0px;" : "display:none;") + "' >";
                a.options.fv ? a.options.watermarkcode += a.options.fvm : 0 < a.options.watermark.length && (a.options.watermarkcode += " ");
                a.options.watermarkcode += "</div>";
                if (a.options.fv || 0 < a.options.watermarklink.length) a.options.watermarkcode += "</a>";
                a.createStyle();
                a.createMarkup();
                a.createImageToolbox();
                0 >= a.elemArray.length || (a.createEvents(), a.loadCarousel(), a.savedElem = -1, a.curElem = -1, a.nextElem = -1, a.prevElem = -1, a.isPaused = !a.options.autoslide, a.isFullscreen = !1, a.showingPoster = !1, a.disableTouchSwipe = !1, d = a.getParams(), a.slideRun(d.html5galleryid && d.html5galleryid in a.elemArray ? d.html5galleryid : 0), a.options.responsive && (a.resizeGallery(), b(window).resize(function() {
                    a.resizeGallery()
                })))
            },
            resizeGallery: function() {
                switch (this.options.skin) {
                    case "vertical":
                    case "showcase":
                        this.resizeStyleVertical();
                        break;
                    default:
                        this.resizeStyleDefault()
                }
                this.resizeImageToolbox()
            },
            initData: function(a) {
                this.elemArray = [];
                if (this.options.src && 0 < this.options.src.length) {
                    var d = this.options.mediatype ? this.options.mediatype : this.checkType(this.options.src);
                    this.elemArray.push([0, "", this.options.src, this.options.webm, this.options.ogg, "", "", this.options.title ? this.options.title : "", this.options.title ? this.options.title : "", d, this.options.width, this.options.height, this.options.poster, this.options.hd, this.options.hdogg, this.options.hdwebm]);
                    this.readTags();
                    a(this)
                } else if (this.options.xml && 0 < this.options.xml.length) {
                    this.options.xmlnocache &&
                        (this.options.xml += 0 > this.options.xml.indexOf("?") ? "?" : "&", this.options.xml += Math.random());
                    var c = this;
                    b.ajax({
                        type: "GET",
                        url: this.options.xml,
                        dataType: "xml",
                        success: function(d) {
                            b(d).find("slide").each(function(a) {
                                var d = b(this).find("title").text(),
                                    e = b(this).find("description").text() ? b(this).find("description").text() : b(this).find("information").text();
                                d || (d = "");
                                e || (e = "");
                                var l = b(this).find("mediatype").text() ? b(this).find("mediatype").text() : c.checkType(b(this).find("file").text());
                                c.elemArray.push([b(this).find("id").length ?
                                    b(this).find("id").text() : a, b(this).find("thumbnail").text(), b(this).find("file").text(), b(this).find("file-ogg").text(), b(this).find("file-webm").text(), b(this).find("link").text(), b(this).find("linktarget").text(), d, e, l, b(this).find("width").length && !isNaN(parseInt(b(this).find("width").text())) ? parseInt(b(this).find("width").text()) : c.options.width, b(this).find("height").length && !isNaN(parseInt(b(this).find("height").text())) ? parseInt(b(this).find("height").text()) : c.options.height, b(this).find("poster").text(),
                                    b(this).find("hd").text(), b(this).find("hdogg").text(), b(this).find("hdwebm").text(), b(this).find("duration").text(), b(this).find("lightboxwidth").text(), b(this).find("lightboxheight").text(), b(this).find("youtubeapikey").text(), b(this).find("youtubeplaylistid").text(), b(this).find("youtubeplaylistmaxresults").text(), "true" == b(this).find("lightbox").text().toLowerCase()
                                ])
                            });
                            c.readTags();
                            a(c)
                        }
                    })
                } else this.options.remote && 0 < this.options.remote.length ? (c = this, b.getJSON(this.options.remote, function(b) {
                    for (var d =
                            0; d < b.length; d++) {
                        var e = b[d].mediatype ? b[d].mediatype : c.checkType(b[d].file);
                        c.elemArray.push([d, b[d].thumbnail, b[d].file, b[d].fileogg, b[d].filewebm, b[d].link, b[d].linktarget, b[d].title, b[d].description, e, b[d].width && !isNaN(parseInt(b[d].width)) ? parseInt(b[d].width) : c.options.width, b[d].height && !isNaN(parseInt(b[d].height)) ? parseInt(b[d].height) : c.options.height, b[d].poster, b[d].hd, b[d].hdogg, b[d].hdwebm, b[d].duration, b[d].lightboxwidth, b[d].lightboxheight, b[d].youtubeapikey, b[d].youtubeplaylistid,
                            b[d].youtubeplaylistmaxresults, b[d].lightbox
                        ])
                    }
                    c.readTags();
                    a(c)
                })) : this.options.youtubechannel ? (d = {
                        alt: "json",
                        v: 2,
                        orderby: this.options.youtubechannel.orderby ? this.options.youtubechannel.orderby : "published",
                        "start-index": this.options.youtubechannel["start-index"] ? this.options.youtubechannel["start-index"] : 1,
                        "max-results": this.options.youtubechannel["max-results"] ? this.options.youtubechannel["max-results"] : 10
                    }, this.options.youtubechannel.author ? d.author = this.options.youtubechannel.author : this.options.youtubechannel.q &&
                    (d.q = this.options.youtubechannel.q), d = "https://gdata.youtube.com/feeds/api/videos?" + b.param(d), c = this, b.getJSON(d, function(b) {
                        if (b && b.feed && b.feed.entry)
                            for (var d = 1; d < b.feed.entry.length; d++) c.elemArray.push([d, ("https:" == document.location.protocol ? "https:" : "http:") + "//img.youtube.com/vi/" + b.feed.entry[d].media$group.yt$videoid.$t + "/0.jpg", b.feed.entry[d].media$group.media$player.url, null, null, null, null, b.feed.entry[d].media$group.media$title.$t, b.feed.entry[d].media$group.media$description.$t, 9,
                                640, 480, ("https:" == document.location.protocol ? "https:" : "http:") + "//img.youtube.com/vi/" + b.feed.entry[d].media$group.yt$videoid.$t + "/0.jpg", null, null, null, null
                            ]);
                        c.readTags();
                        a(c)
                    })) : this.options.youtubeapikey && this.options.youtubeplaylistid ? (c = this, this.getYouTubePlaylist(this.options.youtubeapikey, this.options.youtubeplaylistid, this.options.youtubeplaylistmaxresults, -1, function() {
                    c.readTags();
                    a(c)
                }, this, null)) : (this.readTags(), a(this))
            },
            readTags: function() {
                var a = this;
                (b("img.html5galleryimg", this.container).length ?
                    b("img.html5galleryimg", this.container) : b("img", this.container)).each(function() {
                    var d = b(this).data("lazy-src") ? b(this).data("lazy-src") : b(this).data("lazyload-src") ? b(this).data("lazyload-src") : b(this).attr("src"),
                        c = d,
                        e = b(this).attr("alt"),
                        f = b(this).data("description") ? b(this).data("description") : b(this).data("information");
                    e || (e = "");
                    f || (f = "");
                    var h = a.options.width,
                        j = a.options.height,
                        g = b(this).data("duration") ? b(this).data("duration") : 0,
                        k = null,
                        n = null,
                        p = null,
                        r = null,
                        q = null,
                        t = null,
                        m = null,
                        v = null,
                        z = null,
                        B = null,
                        s = null,
                        x = null,
                        C = null,
                        D = !1;
                    b(this).parent().is("a") && (c = b(this).parent().attr("href"), k = b(this).parent().data("ogg"), n = b(this).parent().data("webm"), p = b(this).parent().data("link"), r = b(this).parent().data("linktarget"), q = b(this).parent().data("poster"), isNaN(b(this).parent().data("width")) || (h = b(this).parent().data("width")), isNaN(b(this).parent().data("height")) || (j = b(this).parent().data("height")), t = b(this).parent().data("hd"), m = b(this).parent().data("hdogg"), v = b(this).parent().data("hdwebm"),
                        z = b(this).parent().data("lightboxwidth"), B = b(this).parent().data("lightboxheight"), s = b(this).parent().data("youtubeapikey"), x = b(this).parent().data("youtubeplaylistid"), C = b(this).parent().data("youtubeplaylistmaxresults"), D = b(this).parent().hasClass("html5gallerylightbox"));
                    var A = b(this).parent().data("mediatype") ? b(this).parent().data("mediatype") : a.checkType(c);
                    a.elemArray.push([a.elemArray.length, d, c, k, n, p, r, e, f, A, h, j, q, t, m, v, g, z, B, s, x, C, D])
                })
            },
            getYouTubePlaylist: function(a, d, c, e, f, h, j) {
                0 <= e &&
                    h.elemArray.splice(e, 1);
                var g = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=" + d + "&key=" + a;
                c && (g = 50 < c ? g + "&maxResults=50" : g + ("&maxResults=" + c));
                j && (g += "&pageToken=" + j);
                var k = !0;
                b.getJSON(g, function(b) {
                    if (b && b.items)
                        for (var g = 0; g < b.items.length; g++) {
                            var j = b.items[g].snippet.resourceId.videoId,
                                j = [g, ("https:" == document.location.protocol ? "https:" : "http:") + "//img.youtube.com/vi/" + j + "/0.jpg", ("https:" == document.location.protocol ? "https:" : "http:") + "//www.youtube.com/embed/" +
                                    j, null, null, null, null, b.items[g].snippet.title, b.items[g].snippet.description, 9, 640, 480, ("https:" == document.location.protocol ? "https:" : "http:") + "//img.youtube.com/vi/" + j + "/0.jpg", null, null, null, null
                                ];
                            0 <= e ? (h.elemArray.splice(e, 0, j), e++) : h.elemArray.push(j)
                        }
                    b && (b.nextPageToken && c && 50 < c) && (k = !1, h.getYouTubePlaylist(a, d, c - 50, e, f, h, b.nextPageToken))
                }).always(function() {
                    k && f(h)
                })
            },
            processElemArray: function(a) {
                for (var b = !1, c = 0; c < a.elemArray.length; c++)
                    if (13 == a.elemArray[c][9] && a.elemArray[c][19] && a.elemArray[c][20]) {
                        b = !0;
                        break
                    }
                b ? a.getYouTubePlaylist(a.elemArray[c][19], a.elemArray[c][20], a.elemArray[c][21], c, a.processElemArray, a, null) : a.init(a)
            },
            createMarkup: function() {
                this.$gallery = jQuery("<div class='html5gallery-container-" + this.id + "'><div class='html5gallery-box-" + this.id + "'><div class='html5gallery-elem-" + this.id + "'></div><div class='html5gallery-title-" + this.id + "'></div><div class='html5gallery-timer-" + this.id + "'></div><div class='html5gallery-viral-" + this.id + "'></div><div class='html5gallery-toolbox-" + this.id +
                    "'><div class='html5gallery-toolbox-bg-" + this.id + "'></div><div class='html5gallery-toolbox-buttons-" + this.id + "'><div class='html5gallery-play-" + this.id + "'></div><div class='html5gallery-pause-" + this.id + "'></div><div class='html5gallery-left-" + this.id + "'></div><div class='html5gallery-right-" + this.id + "'></div><div class='html5gallery-lightbox-" + this.id + "'></div></div></div></div><div class='html5gallery-car-" + this.id + "'><div class='html5gallery-car-list-" + this.id + "'><div class='html5gallery-car-mask-" +
                    this.id + "'><div class='html5gallery-thumbs-" + this.id + "'></div></div><div class='html5gallery-car-slider-bar-" + this.id + "'><div class='html5gallery-car-slider-bar-top-" + this.id + "'></div><div class='html5gallery-car-slider-bar-middle-" + this.id + "'></div><div class='html5gallery-car-slider-bar-bottom-" + this.id + "'></div></div><div class='html5gallery-car-left-" + this.id + "'></div><div class='html5gallery-car-right-" + this.id + "'></div><div class='html5gallery-car-slider-" + this.id + "'></div></div></div></div>");
                this.$gallery.appendTo(this.container);
                this.options.socialurlforeach || this.createSocialMedia();
                this.options.googleanalyticsaccount && !window._gaq && (window._gaq = window._gaq || [], window._gaq.push(["_setAccount", this.options.googleanalyticsaccount]), window._gaq.push(["_trackPageview"]), b.getScript(("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js"))
            },
            createSocialMedia: function() {
                b(".html5gallery-viral-" + this.id, this.$gallery).empty();
                var a = window.location.href;
                this.options.socialurlforeach && (a += (0 > window.location.href.indexOf("?") ? "?" : "&") + "html5galleryid=" + this.elemArray[this.curElem][0]);
                if (this.options.showsocialmedia && this.options.showfacebooklike) {
                    var d = "<div style='display:block; float:left; width:110px; height:21px;'><iframe src='" + ("https:" == document.location.protocol ? "https:" : "http:") + "//www.facebook.com/plugins/like.php?href=",
                        d = this.options.facebooklikeurl && 0 < this.options.facebooklikeurl.length ? d + encodeURIComponent(this.options.facebooklikeurl) :
                        d + a;
                    b(".html5gallery-viral-" + this.id, this.$gallery).append(d + "&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21' scrolling='no' frameborder='0' style='border:none;;overflow:hidden; width:110px; height:21px;' allowTransparency='true'></iframe></div>")
                }
                this.options.showsocialmedia && this.options.showtwitter && (d = "<div style='display:block; float:left; width:110px; height:21px;'><a href='https://twitter.com/share' class='twitter-share-button'",
                    d = this.options.twitterurl && 0 < this.options.twitterurl.length ? d + (" data-url='" + this.options.twitterurl + "'") : d + (" data-url='" + a + "'"), this.options.twitterusername && 0 < this.options.twitterusername.length && (d += " data-via='" + this.options.twittervia + "' data-related='" + this.options.twitterusername + "'"), b(".html5gallery-viral-" + this.id, this.$gallery).append(d + ">Tweet</a></div>"), b.getScript(("https:" == document.location.protocol ? "https:" : "http:") + "//platform.twitter.com/widgets.js"));
                this.options.showsocialmedia &&
                    this.options.showgoogleplus && (d = "<div style='display:block; float:left; width:100px; height:21px;'><div class='g-plusone' data-size='medium'", d = this.options.googleplusurl && 0 < this.options.googleplusurl.length ? d + (" data-href='" + this.options.googleplusurl + "'") : d + (" data-href='" + a + "'"), b(".html5gallery-viral-" + this.id, this.$gallery).append(d + "></div></div>"), b.getScript("https://apis.google.com/js/plusone.js"))
            },
            playGallery: function() {
                var a = this;
                b(".html5gallery-play-" + a.id, a.$gallery).hide();
                b(".html5gallery-pause-" +
                    a.id, a.$gallery).show();
                a.isPaused = !1;
                a.slideshowTimeout = setTimeout(function() {
                    a.slideRun(-1)
                }, a.elemArray[a.curElem][16] ? a.elemArray[a.curElem][16] : a.options.slideshowinterval);
                b(".html5gallery-timer-" + a.id, a.$gallery).css({
                    width: 0
                });
                a.slideTimerCount = 0;
                a.options.showtimer && (a.slideTimer = setInterval(function() {
                    a.showSlideTimer()
                }, 50))
            },
            pauseGallery: function() {
                b(".html5gallery-play-" + this.id, this.$gallery).show();
                b(".html5gallery-pause-" + this.id, this.$gallery).hide();
                this.isPaused = !0;
                clearTimeout(this.slideshowTimeout);
                b(".html5gallery-timer-" + this.id, this.$gallery).css({
                    width: 0
                });
                clearInterval(this.slideTimer);
                this.slideTimerCount = 0
            },
            createEvents: function() {
                var a = this;
                b(".html5gallery-play-" + this.id, this.$gallery).click(function() {

                    a.playGallery()
                });
                b(".html5gallery-pause-" + this.id, this.$gallery).click(function() {
                    a.pauseGallery()
                });
                b(".html5gallery-lightbox-" + this.id, this.$gallery).click(function() {
                    a.goFullscreen()
                });
                b(".html5gallery-left-" + this.id, this.$gallery).click(function() {
                    a.slideRun(-2, !0)
                });
                b(".html5gallery-right-" +
                    this.id, this.$gallery).click(function() {
                    a.slideRun(-1, !0)
                });
                if (a.options.enabletouchswipe) {
                    var d = a.options.isAndroid && a.options.enabletouchswipeonandroid ? !0 : !1;
                    b(".html5gallery-box-" + this.id, this.$gallery).touchSwipe({
                        preventWebBrowser: d,
                        swipeLeft: function() {
                            a.disableTouchSwipe || a.slideRun(-1, !0)
                        },
                        swipeRight: function() {
                            a.disableTouchSwipe || a.slideRun(-2, !0)
                        }
                    })
                }
                b(".html5gallery-box-" + this.id, this.$gallery).mousemove(function() {
                    if ("mouseover" == a.options.imagetoolboxmode) {
                        var b = a.elemArray[a.curElem][9];
                        ("always" == a.options.showimagetoolbox || "image" == a.options.showimagetoolbox && 1 == b) && a.showimagetoolbox(b, !0)
                    }
                });
                b(".html5gallery-box-" + this.id, this.$gallery).hover(function() {
                    a.onSlideshowOver();
                    if ("mouseover" == a.options.imagetoolboxmode) {
                        var b = a.elemArray[a.curElem][9];
                        ("always" == a.options.showimagetoolbox || "image" == a.options.showimagetoolbox && 1 == b) && a.showimagetoolbox(b)
                    }
                }, function() {
                    "mouseover" == a.options.imagetoolboxmode && a.hideimagetoolbox()
                });
                b(".html5gallery-container-" + this.id).mousemove(function() {
                    a.options.titleoverlay &&
                        a.options.titleautohide && (b(".html5gallery-title-" + a.id, a.$gallery).show(), clearTimeout(a.hideTitleTimeout), a.hideTitleTimeout = setTimeout(function() {
                            b(".html5gallery-title-" + a.id, a.$gallery).fadeOut()
                        }, 3E3))
                });
                b(".html5gallery-container-" + this.id).hover(function() {
                    a.options.titleoverlay && a.options.titleautohide && (b(".html5gallery-title-" + a.id, a.$gallery).fadeIn(), clearTimeout(a.hideTitleTimeout), a.hideTitleTimeout = setTimeout(function() {
                        b(".html5gallery-title-" + a.id, a.$gallery).fadeOut()
                    }, 3E3))
                }, function() {
                    a.options.titleoverlay &&
                        a.options.titleautohide && (b(".html5gallery-title-" + a.id, a.$gallery).fadeOut(), clearTimeout(a.hideTitleTimeout))
                });
                b(".html5gallery-car-left-" + this.id, this.$gallery).css({
                    "background-position": "-" + String(2 * this.options.carouselarrowwidth) + "px 0px",
                    cursor: ""
                });
                b(".html5gallery-car-left-" + this.id, this.$gallery).data("disabled", !0);
                b(".html5gallery-car-right-" + this.id, this.$gallery).css({
                    "background-position": "0px 0px"
                });
                b(".html5gallery-car-left-" + this.id, this.$gallery).click(function() {
                    b(this).data("disabled") ||
                        (a.disableupdatecarousel = !0, a.updateCarouselTimeout = setTimeout(function() {
                            a.enableUpdateCarousel()
                        }, a.options.updatecarouselinterval), a.carouselPrev())
                });
                b(".html5gallery-car-right-" + this.id, this.$gallery).click(function() {
                    b(this).data("disabled") || (a.disableupdatecarousel = !0, a.updateCarouselTimeout = setTimeout(function() {
                        a.enableUpdateCarousel()
                    }, a.options.updatecarouselinterval), a.carouselNext())
                });
                b(".html5gallery-car-slider-" + this.id, this.$gallery).bind("drag", function(b, d) {
                    a.disableupdatecarousel = !0;
                    a.updateCarouselTimeout = setTimeout(function() {
                        a.enableUpdateCarousel()
                    }, a.options.updatecarouselinterval);
                    a.carouselSliderDrag(b, d)
                });
                b(".html5gallery-car-slider-bar-" + this.id, this.$gallery).click(function(b) {
                    a.disableupdatecarousel = !0;
                    a.updateCarouselTimeout = setTimeout(function() {
                        a.enableUpdateCarousel()
                    }, a.options.updatecarouselinterval);
                    a.carouselBarClicked(b)
                });
                b(".html5gallery-car-left-" + this.id, this.$gallery).hover(function() {
                    b(this).data("disabled") || b(this).css({
                        "background-position": "-" +
                            a.options.carouselarrowwidth + "px 0px"
                    })
                }, function() {
                    b(this).data("disabled") || b(this).css({
                        "background-position": "0px 0px"
                    })
                });
                b(".html5gallery-car-right-" + this.id, this.$gallery).hover(function() {
                    b(this).data("disabled") || b(this).css({
                        "background-position": "-" + a.options.carouselarrowwidth + "px 0px"
                    })
                }, function() {
                    b(this).data("disabled") || b(this).css({
                        "background-position": "0px 0px"
                    })
                })
            },
            createStyle: function() {
                switch (this.options.skin) {
                    case "vertical":
                    case "showcase":
                        this.createStyleVertical();
                        break;
                    default:
                        this.createStyleDefault()
                }
            },
            resizeStyleVertical: function() {
                if (this.container.parent() && this.container.parent().width()) {
                    this.options.containerWidth = this.container.parent().width();
                    this.options.totalWidth = this.options.containerWidth;
                    this.options.showcarousel && (this.options.carouselWidth = "bottom" == this.options.carouselposition ? this.options.width : this.options.thumbwidth);
                    "bottom" == this.options.carouselposition ? this.options.width = this.options.totalWidth - 2 * this.options.padding : (this.options.width =
                        this.options.totalWidth - 2 * this.options.padding, 0 < this.options.carouselWidth + this.options.carouselmargin && (this.options.width -= this.options.carouselWidth + this.options.carouselmargin));
                    this.options.responsivefullscreen && 0 < this.container.parent().height() ? (this.options.containerHeight = this.container.parent().height(), this.options.totalHeight = this.options.containerHeight, this.options.height = "bottom" == this.options.carouselposition ? this.options.totalHeight - (this.options.headerHeight + 2 * this.options.padding +
                        this.options.carouselheight) : this.options.totalHeight - (this.options.headerHeight + 2 * this.options.padding)) : (this.options.height = Math.round(this.options.width * this.options.originalHeight / this.options.originalWidth), this.options.totalHeight = "bottom" == this.options.carouselposition ? this.options.height + this.options.headerHeight + 2 * this.options.padding + this.options.carouselmargin + this.options.carouselHeight : this.options.height + this.options.headerHeight + 2 * this.options.padding, this.options.containerHeight =
                        this.options.totalHeight);
                    this.container.css({
                        width: this.options.containerWidth,
                        height: this.options.containerHeight
                    });
                    this.options.boxWidth = this.options.width;
                    this.options.boxHeight = this.options.height + this.options.headerHeight;
                    this.options.slideshadow && (this.options.boxWidth += 8);
                    if (this.options.showcarousel)
                        if ("bottom" == this.options.carouselposition) {
                            this.options.carouselWidth = this.options.width;
                            this.options.carouselHeight = this.options.carouselheight;
                            this.options.carouselLeft = this.options.padding;
                            this.options.carouselTop = this.options.height + this.options.headerHeight + 2 * this.options.padding;
                            this.options.carAreaLength = this.options.carouselHeight;
                            this.options.carouselSlider = Math.floor(this.options.carAreaLength / (this.options.thumbheight + this.options.thumbgap)) < this.elemArray.length;
                            this.options.thumbwidth = this.options.width;
                            this.options.carouselSlider && (this.options.thumbwidth -= 20);
                            b(".html5gallery-car-mask-" + this.id).css({
                                width: this.options.thumbwidth + "px"
                            });
                            b(".html5gallery-tn-" + this.id).css({
								  /*width: this.options.thumbwidth +
									  "px"
*/                            });
                            b(".html5gallery-tn-selected-" + this.id).css({
                               /* width: this.options.thumbwidth + "px"*/
                            });
                            b(".html5gallery-car-slider-bar-" + this.id).css({
                                left: String(this.options.thumbwidth + 6) + "px"
                            });
                            this.options.isMobile ? (b(".html5gallery-car-left-" + this.id).css({
                                left: String(this.options.thumbwidth + 5) + "px"
                            }), b(".html5gallery-car-right-" + this.id).css({
                                left: String(this.options.thumbwidth + 5) + "px"
                            })) : b(".html5gallery-car-slider-" + this.id).css({
                                left: String(this.options.thumbwidth + 5) + "px"
                            });
                            var a = this.options.thumbwidth -
                                3 * this.options.thumbmargin;
                            this.options.thumbshowimage && (a -= this.options.thumbimagewidth + 2 * this.options.thumbimageborder);
                            this.options.thumbshowtitle && b("head").append("<style type='text/css' data-creator='html5gallery'>.html5gallery-tn-title-" + this.id + " {width: " + a + "px;}</style>")
                        } else this.options.carouselWidth = this.options.thumbwidth, this.options.carouselHeight = this.options.height + this.options.headerHeight, this.options.carTop = 0, this.options.carBottom = 0, this.options.carAreaLength = this.options.carouselHeight -
                            this.options.carTop - this.options.carBottom, this.options.carouselSlider = Math.floor(this.options.carAreaLength / (this.options.thumbheight + this.options.thumbgap)) < this.elemArray.length, this.options.carouselSlider && (this.options.carouselWidth += 20, this.options.width -= 20, this.options.boxWidth = this.options.width, this.options.slideshadow && (this.options.boxWidth += 8)), "left" == this.options.carouselposition ? (this.options.boxLeft = this.options.padding + this.options.carouselWidth + this.options.carouselmargin, this.options.carouselLeft =
                                this.options.padding) : this.options.carouselLeft = this.options.padding + this.options.width + this.options.carouselmargin, this.options.carouselTop = this.options.padding;
                    b(".html5gallery-container-" + this.id).css({
                        width: this.options.totalWidth + "px",
                        height: this.options.totalHeight + "px"
                    });
                    b(".html5gallery-box-" + this.id).css({
                        width: this.options.boxWidth + "px",
                        height: this.options.boxHeight + "px"
                    });
                    a = this.elemArray[this.curElem][9];
                    if (1 == a || this.showingPoster) {
                        var d = this.elemArray[this.curElem][10],
                            a = this.elemArray[this.curElem][11],
                            c;
                        if (this.isFullscreen) {
                            var e = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : this.fullscreenWidth;
                            c = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : this.fullscreenHeight;
                            c = Math.min(e / d, c / a);
                            c = 1 < c ? 1 : c
                        } else c = "fill" == this.options.resizemode ? Math.max(this.options.width / d, this.options.height / a) : Math.min(this.options.width / d, this.options.height / a);
                        e = Math.round(c * d);
                        d = Math.round(c * a);
                        a = this.isFullscreen ?
                            e : this.options.width;
                        c = this.isFullscreen ? d : this.options.height;
                        var f = Math.round(a / 2 - e / 2),
                            h = Math.round(c / 2 - d / 2);
                        this.isFullscreen && this.adjustFullscreen(a, c, !0);
                        b(".html5gallery-elem-" + this.id).css({
                            height: c + "px"
                        });
                        b(".html5gallery-elem-img-" + this.id).css({
                            height: c + "px"
                        });
                        b(".html5gallery-elem-image-" + this.id).css({
                            height: d + "px",
                            top: h + "px",
                            left: f + "px"
                        })
                    } else if (5 == a || 6 == a || 7 == a || 8 == a || 9 == a || 10 == a || 11 == a) a = this.elemArray[this.curElem][10], d = this.elemArray[this.curElem][11],
                        this.isFullscreen ? (e = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : this.fullscreenWidth, c = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : this.fullscreenHeight, c = Math.min(e / a, c / d), c = 1 < c ? 1 : c, a = Math.round(c * a), c = Math.round(c * d), this.adjustFullscreen(a, c, !0)) : (a = this.options.width, c = this.options.height), b(".html5gallery-elem-" + this.id).css({
                            height: c + "px"
                        }), b(".html5gallery-elem-video-" + this.id).css({
                            width: a +
                                "px",
                            height: c + "px"
                        }), b(".html5gallery-elem-video-container-" + this.id).css({
                            width: a + "px",
                            height: c + "px"
                        }), e = this.options.isIPhone ? c - 48 : c, b(".html5gallery-elem-video-container-" + this.id).find("video").css({
                            width: a + "px",
                            height: e + "px"
                        }), b("#html5gallery-elem-video-" + this.id).css({
                            width: a + "px",
                            height: c + "px"
                        }), b("#html5gallery-elem-video-" + this.id).attr("width", a), b("#html5gallery-elem-video-" + this.id).attr("height", c), b(".html5gallery-elem-video-" + this.id).find("iframe").attr("width", a), b(".html5gallery-elem-video-" +
                            this.id).find("iframe").attr("height", c), b("#html5gallery-elem-video-" + this.id).find("iframe").attr("width", a), b("#html5gallery-elem-video-" + this.id).find("iframe").attr("height", c);
                    c = e = 0;
                    "bottom" == this.options.headerpos && (e = this.options.titleoverlay ? this.options.height - this.options.titleheight : this.options.height, c = this.options.titleoverlay ? this.options.height : this.options.height + this.options.titleheight);
                    a = this.options.slideshadow ? this.options.boxWidth - 8 : this.options.boxWidth;
                    b(".html5gallery-title-" +
                        this.id).css({
                        width: a + "px"
                    });
                    this.options.titleoverlay || b(".html5gallery-title-" + this.id).css({
                        top: e + "px"
                    });
                    b(".html5gallery-viral-" + this.id).css({
                        top: c + "px"
                    });
                    b(".html5gallery-timer-" + this.id).css({
                        top: String(this.options.elemTop + this.options.height - 2) + "px"
                    });
                    this.options.showcarousel && (b(".html5gallery-car-" + this.id).css({
                        width: this.options.carouselWidth + "px",
                        height: this.options.carouselHeight + "px",
                        top: this.options.carouselTop + "px",
                        left: this.options.carouselLeft + "px",
                        top: this.options.carouselTop +
                            "px"
                    }), b(".html5gallery-car-list-" + this.id).css({
                        top: this.options.carTop + "px",
                        height: String(this.options.carAreaLength) + "px",
                        width: this.options.carouselWidth + "px"
                    }), this.options.thumbShowNum = Math.floor(this.options.carAreaLength / (this.options.thumbheight + this.options.thumbgap)), this.options.thumbMaskHeight = this.options.thumbShowNum * this.options.thumbheight + (this.options.thumbShowNum - 1) * this.options.thumbgap, this.options.thumbTotalHeight = this.elemArray.length * this.options.thumbheight + (this.elemArray.length -
                        1) * this.options.thumbgap, this.options.carouselSlider && (this.options.carouselSliderMin = 0, this.options.carouselSliderMax = this.options.thumbMaskHeight - 54, b(".html5gallery-car-slider-bar-" + this.id).css({
                        height: this.options.thumbMaskHeight + "px"
                    }), b(".html5gallery-car-slider-bar-middle-" + this.id).css({
                        height: String(this.options.thumbMaskHeight - 32) + "px"
                    }), this.options.isMobile && b(".html5gallery-car-right-" + this.id).css({
                        top: String(this.options.thumbMaskHeight - 35) + "px"
                    }), b(".html5gallery-car-slider-bar-" +
                        this.id).css({
                        display: "block"
                    }), b(".html5gallery-car-left-" + this.id).css({
                        display: "block"
                    }), b(".html5gallery-car-right-" + this.id).css({
                        display: "block"
                    }), b(".html5gallery-car-slider-" + this.id).css({
                        display: "block"
                    })), a = 0, this.options.carouselNavButton && (a = Math.round(this.options.carAreaLength / 2 - this.options.thumbMaskHeight / 2)), b(".html5gallery-car-mask-" + this.id).css({
                        top: a + "px",
                        height: this.options.thumbMaskHeight + "px"
                    }), this.carouselHighlight(this.curElem))
                }
            },
            createStyleVertical: function() {
                this.options.thumbimagewidth =
                    this.options.thumbshowtitle ? this.options.thumbheight - 2 * this.options.thumbimageborder - 4 : this.options.thumbwidth - 2 * this.options.thumbimageborder - 4;
                this.options.thumbimageheight = this.options.thumbheight - 2 * this.options.thumbimageborder - 4;
                this.options.showtitle || (this.options.titleheight = 0);
                if (!this.options.showsocialmedia || !this.options.showfacebooklike && !this.options.showtwitter && !this.options.showgoogleplus) this.options.socialheight = 0;
                this.options.headerHeight = this.options.titleoverlay ? this.options.socialheight :
                    this.options.titleheight + this.options.socialheight;
                this.options.boxWidth = this.options.width;
                this.options.boxHeight = this.options.height + this.options.headerHeight;
                this.options.boxLeft = this.options.padding;
                this.options.boxTop = this.options.padding;
                this.options.slideshadow && (this.options.boxWidth += 8);
                this.options.showcarousel ? "bottom" == this.options.carouselposition ? (this.options.carouselWidth = this.options.width, this.options.carouselHeight = this.options.carouselheight, this.options.carouselLeft = this.options.padding,
                    this.options.carouselTop = this.options.height + this.options.headerHeight + 2 * this.options.padding, this.options.carAreaLength = this.options.carouselHeight, this.options.carouselSlider = Math.floor(this.options.carAreaLength / (this.options.thumbheight + this.options.thumbgap)) < this.elemArray.length, this.options.thumbwidth = this.options.width, this.options.carouselSlider && (this.options.thumbwidth -= 20)) : (this.options.carouselWidth = this.options.thumbwidth, this.options.carouselHeight = this.options.height + this.options.headerHeight,
                    this.options.carTop = 0, this.options.carBottom = 0, this.options.carAreaLength = this.options.carouselHeight - this.options.carTop - this.options.carBottom, this.options.carouselSlider = Math.floor(this.options.carAreaLength / (this.options.thumbheight + this.options.thumbgap)) < this.elemArray.length, this.options.carouselSlider && (this.options.carouselWidth += 20), "left" == this.options.carouselposition ? (this.options.boxLeft = this.options.padding + this.options.carouselWidth + this.options.carouselmargin, this.options.carouselLeft =
                        this.options.padding) : this.options.carouselLeft = this.options.padding + this.options.width + this.options.carouselmargin, this.options.carouselTop = this.options.padding) : (this.options.carouselWidth = 0, this.options.carouselHeight = 0, this.options.carouselLeft = 0, this.options.carouselTop = 0, this.options.carouselmargin = 0);
                "bottom" == this.options.carouselposition ? (this.options.totalWidth = this.options.width + 2 * this.options.padding, this.options.totalHeight = this.options.height + this.options.headerHeight + 2 * this.options.padding +
                    this.options.carouselmargin + this.options.carouselHeight) : (this.options.totalWidth = this.options.width + this.options.carouselWidth + this.options.carouselmargin + 2 * this.options.padding, this.options.totalHeight = this.options.height + this.options.headerHeight + 2 * this.options.padding);
                this.options.containerWidth = this.options.totalWidth;
                this.options.containerHeight = this.options.totalHeight;
                this.options.responsive ? (this.options.originalWidth = this.options.width, this.options.originalHeight = this.options.height, this.container.css({
                        "max-width": "100%"
                    })) :
                    this.container.css({
                        width: this.options.containerWidth,
                        height: this.options.containerHeight
                    });
                var a = 0,
                    d = 0;
                this.options.elemTop = 0;
                "top" == this.options.headerpos ? (d = 0, a = this.options.socialheight, this.options.elemTop = this.options.headerHeight) : "bottom" == this.options.headerpos && (this.options.elemTop = 0, a = this.options.titleoverlay ? this.options.height - this.options.titleheight : this.options.height, d = this.options.titleoverlay ? this.options.height : this.options.height + this.options.titleheight);
                var c = " .html5gallery-container-" +
                    this.id + " { display:block; position:absolute; left:0px; top:0px; width:" + this.options.totalWidth + "px; height:" + this.options.totalHeight + "px; " + (!this.options.bgimage ? "" : "background:url('" + this.options.skinfolder + this.options.bgimage + "') center top;") + " background-color:" + this.options.bgcolor + ";}";
                this.options.galleryshadow && (c += " .html5gallery-container-" + this.id + " { -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}");
                var c = c + (" .html5gallery-box-" +
                        this.id + " {display:block; position:absolute; text-align:center; left:" + this.options.boxLeft + "px; top:" + this.options.boxTop + "px; width:" + this.options.boxWidth + "px; height:" + this.options.boxHeight + "px; }"),
                    e = Math.round(this.options.socialheight / 2 - 12),
                    c = c + (" .html5gallery-title-text-" + this.id + " " + this.options.titlecss + " .html5gallery-title-text-" + this.id + " " + this.options.titlecsslink + " .html5gallery-error-" + this.id + " " + this.options.errorcss),
                    c = c + (" .html5gallery-description-text-" + this.id + " " + this.options.descriptioncss +
                        " .html5gallery-description-text-" + this.id + " " + this.options.descriptioncsslink),
                    c = c + (" .html5gallery-fullscreen-title-" + this.id + "" + this.options.lightboxtitlecss + " .html5gallery-fullscreen-title-" + this.id + "" + this.options.lightboxtitlelinkcss),
                    c = c + (" .html5gallery-fullscreen-description-" + this.id + "" + this.options.lightboxdescriptioncss + " .html5gallery-fullscreen-description-" + this.id + "" + this.options.lightboxdescriptionlinkcss),
                    c = c + (" .html5gallery-viral-" + this.id + " {display:block; overflow:hidden; position:absolute; text-align:left; top:" +
                        d + "px; left:0px; width:" + this.options.boxWidth + "px; height:" + this.options.socialheight + "px; padding-top:" + e + "px;}"),
                    c = c + (" .html5gallery-title-" + this.id + " {display:" + (this.options.titleoverlay && this.options.titleautohide ? "none" : "block") + "; overflow:hidden; position:absolute; left:0px; width:" + this.options.boxWidth + "px; "),
                    c = this.options.titleoverlay ? "top" == this.options.headerpos ? c + "top:0px; height:auto; }" : c + "bottom:0px; height:auto; }" : c + ("top:" + a + "px; height:" + this.options.titleheight + "px; }"),
                    c = c + (" .html5gallery-timer-" + this.id + " {display:block; position:absolute; top:" + String(this.options.elemTop + this.options.height - 2) + "px; left:0px; width:0px; height:2px; background-color:#ccc; filter:alpha(opacity=60); opacity:0.6; }"),
                    c = c + (" .html5gallery-elem-" + this.id + " {display:block; overflow:hidden; position:absolute; top:" + this.options.elemTop + "px; left:0px;height:" + this.options.height + "px;}");
                this.options.isIE7 || this.options.isIE6 ? (c += " .html5gallery-loading-" +
                    this.id + " {display:none; }", c += " .html5gallery-loading-center-" + this.id + " {display:none; }") : (c += " .html5gallery-loading-" + this.id + " {display:block; position:absolute; top:4px; right:4px; width:100%; height:100%; background:url('" + this.options.skinfolder + "loading.gif') no-repeat top right;}", c += " .html5gallery-loading-center-" + this.id + " {display:block; position:absolute; top:0px; left:0px; width:100%; height:100%; background:url('" + this.options.skinfolder + "loading_center.gif') no-repeat center center;}");
                0 < this.options.borderradius && (c += " .html5gallery-elem-" + this.id + " { overflow:hidden; border-radius:" + this.options.borderradius + "px; -moz-border-radius:" + this.options.borderradius + "px; -webkit-border-radius:" + this.options.borderradius + "px;}");
                this.options.slideshadow && (c += " .html5gallery-title-" + this.id + " { padding:4px;}", c += " .html5gallery-timer-" + this.id + " { margin:4px;}", c += " .html5gallery-elem-" + this.id + " { overflow:hidden; padding:4px; -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}");
                this.options.showcarousel ? (c += " .html5gallery-car-" + this.id + " { position:absolute; display:block; overflow:hidden; width:" + this.options.carouselWidth + "px; height:" + this.options.carouselHeight + "px; left:" + this.options.carouselLeft + "px; top:" + this.options.carouselTop + "px; }", c += " .html5gallery-car-list-" + this.id + " { position:absolute; display:block; overflow:hidden; top:" + this.options.carTop + "px; height:" + String(this.options.carAreaLength) + "px; left:0px; width:" + this.options.carouselWidth + "px; }", c +=
                    ".html5gallery-thumbs-" + this.id + " {margin-top:0px; height:" + String(this.elemArray.length * (this.options.thumbheight + this.options.thumbgap)) + "px;}", this.options.thumbShowNum = Math.floor(this.options.carAreaLength / (this.options.thumbheight + this.options.thumbgap)), this.options.thumbMaskHeight = this.options.thumbShowNum * this.options.thumbheight + (this.options.thumbShowNum - 1) * this.options.thumbgap, this.options.thumbTotalHeight = this.elemArray.length * this.options.thumbheight + (this.elemArray.length - 1) * this.options.thumbgap,
                    this.options.carouselSliderMin = 0, this.options.carouselSliderMax = this.options.thumbMaskHeight - 54, c += " .html5gallery-car-slider-bar-" + this.id + " { position:absolute; display:" + (this.options.carouselSlider ? "block" : "none") + "; overflow:hidden; top:0px; height:" + this.options.thumbMaskHeight + "px; left:" + String(this.options.thumbwidth + 6) + "px; width:14px;}", c += " .html5gallery-car-slider-bar-top-" + this.id + " { position:absolute; display:block; top:0px; left:0px; width:14px; height:16px; background:url('" + this.options.skinfolder +
                    "bartop.png')}", c += " .html5gallery-car-slider-bar-middle-" + this.id + " { position:absolute; display:block; top:16px; left:0px; width:14px; height:" + String(this.options.thumbMaskHeight - 32) + "px; background:url('" + this.options.skinfolder + "bar.png')}", c += " .html5gallery-car-slider-bar-bottom-" + this.id + " { position:absolute; display:block; bottom:0px; left:0px; width:14px; height:16px; background:url('" + this.options.skinfolder + "barbottom.png')}", c = this.options.isMobile ? c + (" .html5gallery-car-left-" + this.id +
                        " { position:absolute; display:" + (this.options.carouselSlider ? "block" : "none") + "; cursor:pointer; overflow:hidden; width:16px; height:35px; left:" + String(this.options.thumbwidth + 5) + "px; top:0px; background:url('" + this.options.skinfolder + "slidertop.png')}  .html5gallery-car-right-" + this.id + " { position:absolute; display:" + (this.options.carouselSlider ? "block" : "none") + "; cursor:pointer; overflow:hidden; width:16px; height:35px; left:" + String(this.options.thumbwidth + 5) + "px; top:" + String(this.options.thumbMaskHeight -
                            35) + "px; background:url('" + this.options.skinfolder + "sliderbottom.png')} ") : c + (" .html5gallery-car-slider-" + this.id + " { position:absolute; display:" + (this.options.carouselSlider ? "block" : "none") + "; overflow:hidden; cursor:pointer; top:0px; height:54px; left:" + String(this.options.thumbwidth + 5) + "px; width:16px; background:url('" + this.options.skinfolder + "slider.png');}"), a = 0, this.options.carouselNavButton && (a = Math.round(this.options.carAreaLength / 2 - this.options.thumbMaskHeight / 2)), c += " .html5gallery-car-mask-" +
                    this.id + " { position:absolute; display:block; overflow:hidden; top:" + a + "px; height:" + this.options.thumbMaskHeight + "px; left:0px; width:" + this.options.thumbwidth + "px;} ", a = this.options.thumbheight, this.options.isIE || (a = this.options.thumbheight - 2), c += " .html5gallery-tn-" + this.id + " { display:block; margin-bottom:" + this.options.thumbgap + "px; text-align:center; cursor:pointer; width:" + this.options.thumbwidth + "px;height:" + a + "px;overflow:hidden;", this.options.carouselbgtransparent ? c += "background-color:transparent;" :
                    (this.options.isIE || (c += "border-top:1px solid " + this.options.carouseltopborder + "; border-bottom:1px solid " + this.options.carouselbottomborder + ";"), c += "background-color: " + this.options.carouselbgcolorend + "; background: " + this.options.carouselbgcolorend + " -webkit-gradient(linear, left top, left bottom, from(" + this.options.carouselbgcolorstart + "), to(" + this.options.carouselbgcolorend + ")) no-repeat; background: " + this.options.carouselbgcolorend + " -moz-linear-gradient(top, " + this.options.carouselbgcolorstart +
                        ", " + this.options.carouselbgcolorend + ") no-repeat; filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselbgcolorstart + ", endColorstr=" + this.options.carouselbgcolorend + ") no-repeat; -ms-filter: 'progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselbgcolorstart + ", endColorstr=" + this.options.carouselbgcolorend + ")' no-repeat;"), this.options.carouselbgimage && (c += "background:url('" + this.options.skinfolder + this.options.carouselbgimage + "') center top;"),
                    c = c + "}" + (" .html5gallery-tn-selected-" + this.id + " { display:block; margin-bottom:" + this.options.thumbgap + "px;text-align:center; cursor:pointer; width:" + this.options.thumbwidth + "px;height:" + a + "px;overflow:hidden;"), this.options.carouselbgtransparent ? c += "background-color:transparent;" : (this.options.isIE || (c += "border-top:1px solid " + this.options.carouselhighlighttopborder + "; border-bottom:1px solid " + this.options.carouselhighlightbottomborder + ";"), c += "background-color: " + this.options.carouselhighlightbgcolorend +
                        "; background: " + this.options.carouselhighlightbgcolorend + " -webkit-gradient(linear, left top, left bottom, from(" + this.options.carouselhighlightbgcolorstart + "), to(" + this.options.carouselhighlightbgcolorend + ")) no-repeat; background: " + this.options.carouselhighlightbgcolorend + " -moz-linear-gradient(top, " + this.options.carouselhighlightbgcolorstart + ", " + this.options.carouselhighlightbgcolorend + ") no-repeat; filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselhighlightbgcolorstart +
                        ", endColorstr=" + this.options.carouselhighlightbgcolorend + ") no-repeat; -ms-filter: 'progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselhighlightbgcolorstart + ", endColorstr=" + this.options.carouselhighlightbgcolorend + ")' no-repeat;"), this.options.carouselbgimage && (c += "background:url('" + this.options.skinfolder + this.options.carouselbgimage + "') center top;"), c += "}", c += " .html5gallery-tn-selected-" + this.id + " .html5gallery-tn-img-" + this.id + " {background-color:" + this.options.thumbimagebordercolor +
                    ";} .html5gallery-tn-" + this.id + " { filter:alpha(opacity=" + Math.round(100 * this.options.thumbopacity) + "); opacity:" + this.options.thumbopacity + "; }  .html5gallery-tn-selected-" + this.id + " { filter:alpha(opacity=100); opacity:1; } ", a = this.options.thumbwidth - 3 * this.options.thumbmargin, this.options.thumbshowimage ? (a -= this.options.thumbimagewidth + 2 * this.options.thumbimageborder, d = this.options.thumbshowtitle ? this.options.thumbmargin : this.options.thumbwidth / 2 - (this.options.thumbimagewidth + 2 * this.options.thumbimageborder) /
                        2, e = Math.round((this.options.thumbheight - 2) / 2 - (this.options.thumbimageheight + 2 * this.options.thumbimageborder) / 2), c += " .html5gallery-tn-img-" + this.id + " {display:block; overflow:hidden; float:left; margin-top:" + e + "px; margin-left:" + d + "px; width:" + String(this.options.thumbimagewidth + 2 * this.options.thumbimageborder) + "px;height:" + String(this.options.thumbimageheight + 2 * this.options.thumbimageborder) + "px;}") : c += " .html5gallery-tn-img-" + this.id + " {display:none;}", this.options.thumbshowtitle ? (c += " .html5gallery-tn-title-" +
                        this.id + " {display:block; overflow:hidden; float:left; margin-top:0px; margin-left:" + this.options.thumbmargin + "px; width:" + a + "px;height:" + String(this.options.thumbheight - 2) + "px;" + (this.options.thumbshowdescription ? "" : "line-height:" + String(this.options.thumbheight - 2) + "px;") + "}", c += " .html5gallery-tn-title-" + this.id + this.options.thumbtitlecss, c += " .html5gallery-tn-description-" + this.id + this.options.thumbdescriptioncss) : (c += " .html5gallery-tn-title-" + this.id + " {display:none;}", c += " .html5gallery-tn-description-" +
                        this.id + " {display:none;}"), this.carouselHighlight = function(a) {
                        b("#html5gallery-tn-" + this.id + "-" + a, this.$gallery).removeClass("html5gallery-tn-" + this.id).addClass("html5gallery-tn-selected-" + this.id);
                        if (!(this.options.thumbShowNum >= this.elemArray.length)) {
                            a = Math.floor(a / this.options.thumbShowNum) * this.options.thumbShowNum * (this.options.thumbheight + this.options.thumbgap);
                            a >= this.options.thumbTotalHeight - this.options.thumbMaskHeight && (a = this.options.thumbTotalHeight - this.options.thumbMaskHeight);
                            var d =
                                a / (this.elemArray.length * (this.options.thumbheight + this.options.thumbgap) - this.options.thumbMaskHeight),
                                d = d * (this.options.carouselSliderMax - this.options.carouselSliderMin);
                            b(".html5gallery-car-slider-" + this.id, this.$gallery).stop(!0).animate({
                                top: d
                            }, 300);
                            b(".html5gallery-thumbs-" + this.id, this.$gallery).stop(!0).animate({
                                marginTop: -1 * a
                            }, 300);
                            this.updateCarouseButtons(-a)
                        }
                    }, this.carouselBarClicked = function(a) {
                        var d = b(".html5gallery-thumbs-" + this.id, this.$gallery);
                        a.pageY > b(".html5gallery-car-slider-" +
                            this.id, this.$gallery).offset().top ? (a = -1 * parseInt(d.css("margin-top")) + this.options.thumbShowNum * (this.options.thumbheight + this.options.thumbgap), a >= this.options.thumbTotalHeight - this.options.thumbMaskHeight && (a = this.options.thumbTotalHeight - this.options.thumbMaskHeight)) : (a = -1 * parseInt(d.css("margin-top")) - this.options.thumbShowNum * (this.options.thumbheight + this.options.thumbgap), 0 > a && (a = 0));
                        d.stop(!0).animate({
                            marginTop: -a
                        }, 500);
                        this.updateCarouseButtons(-a);
                        a = a * (this.options.carouselSliderMax -
                            this.options.carouselSliderMin) / (this.elemArray.length * (this.options.thumbheight + this.options.thumbgap) - this.options.thumbMaskHeight);
                        a < this.options.carouselSliderMin && (a = this.options.carouselSliderMin);
                        a > this.options.carouselSliderMax && (a = this.options.carouselSliderMax);
                        b(".html5gallery-car-slider-" + this.id, this.$gallery).stop(!0).animate({
                            top: a
                        }, 500)
                    }, this.carouselSliderDrag = function(a, d) {
                        var c = d.offsetY - b(".html5gallery-car-slider-bar-" + this.id, this.$gallery).offset().top;
                        c < this.options.carouselSliderMin &&
                            (c = this.options.carouselSliderMin);
                        c > this.options.carouselSliderMax && (c = this.options.carouselSliderMax);
                        b(".html5gallery-car-slider-" + this.id, this.$gallery).css({
                            top: c
                        });
                        var e = this.elemArray.length * (this.options.thumbheight + this.options.thumbgap) - this.options.thumbMaskHeight,
                            e = e * c / (this.options.carouselSliderMax - this.options.carouselSliderMin),
                            e = Math.round(e / (this.options.thumbheight + this.options.thumbgap)),
                            e = -1 * e * (this.options.thumbheight + this.options.thumbgap);
                        b(".html5gallery-thumbs-" + this.id,
                            this.$gallery).stop(!0).animate({
                            marginTop: e
                        }, 300)
                    }, this.carouselPrev = function() {
                        var a = b(".html5gallery-thumbs-" + this.id, this.$gallery);
                        if (0 != parseInt(a.css("margin-top"))) {
                            var d = -1 * parseInt(a.css("margin-top")) - this.options.thumbShowNum * (this.options.thumbheight + this.options.thumbgap);
                            0 > d && (d = 0);
                            a.animate({
                                marginTop: -d
                            }, 500, this.options.carouseleasing);
                            this.updateCarouseButtons(-d)
                        }
                    }, this.carouselNext = function() {
                        var a = b(".html5gallery-thumbs-" + this.id, this.$gallery);
                        if (parseInt(a.css("margin-top")) !=
                            -(this.options.thumbTotalHeight - this.options.thumbMaskHeight)) {
                            var d = -1 * parseInt(a.css("margin-top")) + this.options.thumbShowNum * (this.options.thumbheight + this.options.thumbgap);
                            d >= this.options.thumbTotalHeight - this.options.thumbMaskHeight && (d = this.options.thumbTotalHeight - this.options.thumbMaskHeight);
                            a.animate({
                                marginTop: -d
                            }, 500, this.options.carouseleasing);
                            this.updateCarouseButtons(-d)
                        }
                    }, this.updateCarouseButtons = function(a) {
                        var d = b(".html5gallery-car-left-" + this.id, this.$gallery),
                            c = b(".html5gallery-car-right-" +
                                this.id, this.$gallery),
                            e = -1 * (this.options.thumbTotalHeight - this.options.thumbMaskHeight);
                        0 == a ? (d.css({
                            "background-position": "-" + String(2 * this.options.carouselarrowwidth) + "px 0px",
                            cursor: ""
                        }), d.data("disabled", !0)) : d.data("disabled") && (d.css({
                            "background-position": "0px 0px",
                            cursor: "pointer"
                        }), d.data("disabled", !1));
                        a == e ? (c.css({
                            "background-position": "-" + String(2 * this.options.carouselarrowwidth) + "px 0px",
                            cursor: ""
                        }), c.data("disabled", !0)) : c.data("disabled") && (c.css({
                            "background-position": "0px 0px",
                            cursor: "pointer"
                        }), c.data("disabled", !1))
                    }) : c += " .html5gallery-car-" + this.id + " { display:none; }";
                c += ".html5gallery-container-" + this.id + " div {box-sizing:content-box;}";
                b("head").append("<style type='text/css' data-creator='html5gallery'>" + c + "</style>")
            },
            resizeImageToolbox: function() {
                if ("center" != this.options.imagetoolboxstyle) {
                    var a = Math.round(("bottom" == this.options.headerpos ? 0 : this.options.headerHeight) + this.options.height / 2 - 24),
                        d = a + Math.round(this.options.height / 2) - 32,
                        c = this.options.boxWidth -
                        48,
                        e = this.options.showfullscreenbutton ? c - 48 : c;
                    b(".html5gallery-play-" + this.id).css({
                        top: d + "px",
                        left: e + "px"
                    });
                    b(".html5gallery-pause-" + this.id).css({
                        top: d + "px",
                        left: e + "px"
                    });
                    b(".html5gallery-left-" + this.id).css({
                        top: a + "px"
                    });
                    b(".html5gallery-right-" + this.id).css({
                        top: a + "px",
                        left: c + "px"
                    });
                    b(".html5gallery-lightbox-" + this.id).css({
                        top: d + "px",
                        left: c + "px"
                    })
                }
            },
            createImageToolbox: function() {
                1 >= this.elemArray.length && (this.options.showplaybutton = this.options.showprevbutton = this.options.shownextbutton = !1);
                if ("never" != this.options.showimagetoolbox) {
                    var a;
                    if ("center" == this.options.imagetoolboxstyle) a = " .html5gallery-toolbox-" + this.id + " {display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; overflow:hidden; position:relative; margin:0px auto; text-align:center; height:40px;}", a += " .html5gallery-toolbox-bg-" + this.id + " {display:block; left:0px; top:0px; width:100%; height:100%; position:absolute; filter:alpha(opacity=60); opacity:0.6; background-color:#222222; }", a += " .html5gallery-toolbox-buttons-" +
                        this.id + " {display:block; margin:0px auto; height:100%;}", a += " .html5gallery-play-" + this.id + " { position:relative; float:left; display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; overflow:hidden; width:32px; height:32px; margin-left:2px; margin-right:2px; margin-top:" + Math.round(4) + "px; background:url('" + this.options.skinfolder + "play.png') no-repeat top left; } ", a += " .html5gallery-pause-" + this.id + " { position:relative; float:left; display:" + ("show" == this.options.imagetoolboxmode ?
                            "block" : "none") + "; cursor:pointer; overflow:hidden; width:32px; height:32px; margin-left:2px; margin-right:2px; margin-top:" + Math.round(4) + "px; background:url('" + this.options.skinfolder + "pause.png') no-repeat top left; } ", a += " .html5gallery-left-" + this.id + " { position:relative; float:left; display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; overflow:hidden; width:32px; height:32px; margin-left:2px; margin-right:2px; margin-top:" + Math.round(4) + "px; background:url('" +
                        this.options.skinfolder + "prev.png') no-repeat top left; } ", a += " .html5gallery-right-" + this.id + " { position:relative; float:left; display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; overflow:hidden; width:32px; height:32px; margin-left:2px; margin-right:2px; margin-top:" + Math.round(4) + "px;  } ", a += " .html5gallery-lightbox-" + this.id + " {position:relative; float:left; display:" + ("show" == this.options.imagetoolboxmode ?
                            "block" : "none") + "; cursor:pointer; overflow:hidden; width:32px; height:32px; margin-left:2px; margin-right:2px; margin-top:" + Math.round(4) + "px; background:url('" + this.options.skinfolder + "lightbox.png') no-repeat top left; } ";
                    else {
                        var d = Math.round(("bottom" == this.options.headerpos ? 0 : this.options.headerHeight) + this.options.height / 2 - 24),
                            c = d + Math.round(this.options.height / 2) - 32,
                            e = this.options.width - 54,
                            f = this.options.showfullscreenbutton ? e - 48 : e;
                        a = " .html5gallery-toolbox-" + this.id + " {display:" + ("show" ==
                            this.options.imagetoolboxmode ? "block" : "none") + ";}";
                        a += " .html5gallery-toolbox-bg-" + this.id + " {display:none;}";
                        a += " .html5gallery-toolbox-buttons-" + this.id + " {display:block;}";
                        a += " .html5gallery-play-" + this.id + " { position:absolute; display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; top:" + c + "px; left:" + f + "px; width:48px; height:48px; background:url('" + this.options.skinfolder + "side_play.png') no-repeat top left;} ";
                        a += " .html5gallery-pause-" + this.id + " { position:absolute; display:" +
                            ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; top:" + c + "px; left:" + f + "px; width:48px; height:48px; background:url('" + this.options.skinfolder + "side_pause.png') no-repeat top left;} ";
                        a += " .html5gallery-left-" + this.id + " { position:absolute; display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; top:" + d + "px; left:0px; width:48px; height:48px; } ";
                        a += " .html5gallery-right-" +
                            this.id + " { position:absolute; display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; top:" + d + "px; left:" + e + "px; width:48px; height:48px;} ";
                        a += " .html5gallery-lightbox-" + this.id + " {position:absolute; display:" + ("show" == this.options.imagetoolboxmode ? "block" : "none") + "; cursor:pointer; top:" + c + "px; left:" + e + "px; width:48px; height:48px; background:url('" + this.options.skinfolder + "side_lightbox.png') no-repeat top left;} "
                    }
                    b(".html5gallery-play-" +
                        this.id, this.$gallery).hover(function() {
                        b(this).css({
                            "background-position": "right top"
                        })
                    }, function() {
                        b(this).css({
                            "background-position": "left top"
                        })
                    });
                    b(".html5gallery-pause-" + this.id, this.$gallery).hover(function() {
                        b(this).css({
                            "background-position": "right top"
                        })
                    }, function() {
                        b(this).css({
                            "background-position": "left top"
                        })
                    });
                    b(".html5gallery-left-" + this.id, this.$gallery).hover(function() {
                        b(this).css({
                            "background-position": "right top"
                        })
                    }, function() {
                        b(this).css({
                            "background-position": "left top"
                        })
                    });
                    b(".html5gallery-right-" + this.id, this.$gallery).hover(function() {
                        b(this).css({
                            "background-position": "right top"
                        })
                    }, function() {
                        b(this).css({
                            "background-position": "left top"
                        })
                    });
                    b(".html5gallery-lightbox-" + this.id, this.$gallery).hover(function() {
                        b(this).css({
                            "background-position": "right top"
                        })
                    }, function() {
                        b(this).css({
                            "background-position": "left top"
                        })
                    });
                    b("head").append("<style type='text/css' data-creator='html5gallery'>" + a + "</style>")
                }
                this.showimagetoolbox = function(a, d) {
                    if (this.options.showplaybutton ||
                        this.options.showprevbutton || this.options.shownextbutton || this.options.showfullscreenbutton) {
                        var c = this;
                        clearTimeout(c.hideToolboxTimeout);
                        c.hideToolboxTimeout = setTimeout(function() {
                            c.hideimagetoolbox()
                        }, 3E3);
                        if ("center" == this.options.imagetoolboxstyle) {
                            var e = Math.round(("bottom" == this.options.headerpos ? 0 : this.options.headerHeight) + this.options.height / 2);
                            if (6 == a || 7 == a || 8 == a || 9 == a || 10 == a || 11 == a) e += 45;
                            b(".html5gallery-toolbox-" + this.id, this.$gallery).css({
                                top: e
                            });
                            e = 0;
                            this.options.showplaybutton && 1 ==
                                a ? (e += 36, this.isPaused ? (b(".html5gallery-play-" + this.id, this.$gallery).show(), b(".html5gallery-pause-" + this.id, this.$gallery).hide()) : (b(".html5gallery-play-" + this.id, this.$gallery).hide(), b(".html5gallery-pause-" + this.id, this.$gallery).show())) : (b(".html5gallery-play-" + this.id, this.$gallery).hide(), b(".html5gallery-pause-" + this.id, this.$gallery).hide());
                            this.options.showprevbutton ? (e += 36, b(".html5gallery-left-" + this.id, this.$gallery).show()) : b(".html5gallery-left-" + this.id, this.$gallery).hide();
                            this.options.shownextbutton ? (e += 36, b(".html5gallery-right-" + this.id, this.$gallery).show()) : b(".html5gallery-right-" + this.id, this.$gallery).hide();
                            this.options.showfullscreenbutton && 1 == a ? (e += 36, b(".html5gallery-lightbox-" + this.id, this.$gallery).show()) : b(".html5gallery-lightbox-" + this.id, this.$gallery).hide();
                            b(".html5gallery-toolbox-" + this.id, this.$gallery).css({
                                width: e + 16
                            });
                            b(".html5gallery-toolbox-buttons-" + this.id, this.$gallery).css({
                                width: e
                            })
                        } else this.options.showplaybutton && 1 == a ? this.isPaused ?
                            (b(".html5gallery-play-" + this.id, this.$gallery).show(), b(".html5gallery-pause-" + this.id, this.$gallery).hide()) : (b(".html5gallery-play-" + this.id, this.$gallery).hide(), b(".html5gallery-pause-" + this.id, this.$gallery).show()) : (b(".html5gallery-play-" + this.id, this.$gallery).hide(), b(".html5gallery-pause-" + this.id, this.$gallery).hide()), this.options.showprevbutton ? b(".html5gallery-left-" + this.id, this.$gallery).show() : b(".html5gallery-left-" + this.id, this.$gallery).hide(), this.options.shownextbutton ? b(".html5gallery-right-" +
                                this.id, this.$gallery).show() : b(".html5gallery-right-" + this.id, this.$gallery).hide(), this.options.showfullscreenbutton && 1 == a ? b(".html5gallery-lightbox-" + this.id, this.$gallery).show() : b(".html5gallery-lightbox-" + this.id, this.$gallery).hide();
                        this.options.isIE678 || d ? b(".html5gallery-toolbox-" + this.id, this.$gallery).show() : b(".html5gallery-toolbox-" + this.id, this.$gallery).fadeIn()
                    }
                };
                this.hideimagetoolbox = function() {
                    "show" != this.options.imagetoolboxmode && (clearTimeout(this.hideToolboxTimeout), this.options.isIE678 ?
                        b(".html5gallery-toolbox-" + this.id, this.$gallery).hide() : b(".html5gallery-toolbox-" + this.id, this.$gallery).fadeOut())
                }
            },
            resizeStyleDefault: function() {
                if (this.container.parent() && this.container.parent().width()) {
                    this.options.containerWidth = this.container.parent().width();
                    this.options.totalWidth = this.options.containerWidth;
                    this.options.width = this.options.totalWidth - 2 * this.options.padding;
                    if (this.options.showcarousel && (this.options.carouselHeight = this.options.thumbheight + 2 * this.options.thumbmargin, this.options.carouselmultirows)) {
                        if ("samecolumn" ==
                            this.options.thumbresponsive) {
                            this.options.carouselcolumn = this.options.thumbcolumns;
                            if (this.options.thumbcolumnsresponsive) {
                                var a = this.options.isMobile ? Math.max(b(window).width(), b(document).width()) : b(window).width();
                                a < this.options.thumbsmallsize ? this.options.carouselcolumn = this.options.thumbsmallcolumns : a < this.options.thumbmediumsize && (this.options.carouselcolumn = this.options.thumbmediumcolumns)
                            }
                            this.options.thumbwidth = Math.min((this.options.width - this.options.thumbgap * (this.options.carouselcolumn -
                                1)) / this.options.carouselcolumn);
                            this.options.thumbheight = this.options.thumbwidth * this.options.thumboriginalheight / this.options.thumboriginalwidth;
                            this.options.thumbimagewidth = this.options.thumbwidth - 2 * this.options.thumbimageborder;
                            this.options.thumbimageheight = this.options.thumbheight - 2 * this.options.thumbimageborder;
                            this.options.thumbshowtitle && (this.options.thumbheight += this.options.thumbtitleheight)
                        } else this.options.carouselcolumn = Math.floor(this.options.width / (this.options.thumbwidth + this.options.thumbgap)),
                            1 > this.options.carouselcolumn && (this.options.carouselcolumn = 1);
                        this.options.carouselHeight = Math.ceil(this.elemArray.length / this.options.carouselcolumn) * (this.options.thumbheight + this.options.thumbrowgap)
                    }
                    this.options.responsivefullscreen && 0 < this.container.parent().height() ? (this.options.containerHeight = this.container.parent().height(), this.options.totalHeight = this.options.containerHeight, this.options.height = this.options.totalHeight - (this.options.headerHeight + 2 * this.options.padding), 0 < this.options.carouselHeight +
                        this.options.carouselmargin && (this.options.height -= this.options.carouselHeight + this.options.carouselmargin)) : (this.options.height = Math.round(this.options.width * this.options.originalHeight / this.options.originalWidth), this.options.totalHeight = this.options.height + this.options.carouselHeight + this.options.carouselmargin + this.options.headerHeight + 2 * this.options.padding, this.options.containerHeight = this.options.totalHeight);
                    this.container.css({
                        width: this.options.containerWidth,
                        height: this.options.containerHeight
                    });
                    this.options.boxWidth = this.options.width;
                    this.options.boxHeight = this.options.height + this.options.headerHeight;
                    this.options.slideshadow && (this.options.boxWidth += 8);
                    this.options.showcarousel && (this.options.carouselWidth = this.options.width, this.options.carouselLeft = this.options.padding, this.options.carouselTop = this.options.padding + this.options.boxHeight + this.options.carouselmargin);
                    b(".html5gallery-container-" + this.id).css({
                        width: this.options.totalWidth + "px",
                        height: this.options.totalHeight + "px"
                    });
                    b(".html5gallery-box-" +
                        this.id).css({
                        width: this.options.boxWidth + "px",
                        height: this.options.boxHeight + "px"
                    });
                    a = this.elemArray[this.curElem][9];
                    if (1 == a || this.showingPoster) {
                        var d = this.elemArray[this.curElem][10],
                            c = this.elemArray[this.curElem][11],
                            e;
                        if (this.isFullscreen) {
                            var a = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : this.fullscreenWidth,
                                f = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : this.fullscreenHeight;
                            e = Math.min(a /
                                d, f / c);
                            e = 1 < e ? 1 : e
                        } else e = "fill" == this.options.resizemode ? Math.max(this.options.width / d, this.options.height / c) : Math.min(this.options.width / d, this.options.height / c);
                        f = Math.round(e * d);
                        c = Math.round(e * c);
                        a = this.isFullscreen ? f : this.options.width;
                        e = this.isFullscreen ? c : this.options.height;
                        var d = Math.round(a / 2 - f / 2),
                            h = Math.round(e / 2 - c / 2);
                        this.isFullscreen && this.adjustFullscreen(a, e, !0);
                        b(".html5gallery-elem-" + this.id).css({
                            height: e + "px"
                        });
                        b(".html5gallery-elem-img-" + this.id).css({
                            width: a + "px",
                            height: e +
                                "px"
                        });
                        b(".html5gallery-elem-image-" + this.id).css({
                            width: f + "px",
                            height: c + "px",
                            top: h + "px",
                            left: d + "px"
                        })
                    } else if (5 == a || 6 == a || 7 == a || 8 == a || 9 == a || 10 == a || 11 == a) d = this.elemArray[this.curElem][10], c = this.elemArray[this.curElem][11], this.isFullscreen ? (a = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : this.fullscreenWidth, f = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : this.fullscreenHeight, e = Math.min(a / d, f /
                        c), e = 1 < e ? 1 : e, a = Math.round(e * d), e = Math.round(e * c), this.adjustFullscreen(a, e, !0)) : (a = this.options.width, e = this.options.height), b(".html5gallery-elem-" + this.id).css({
                        height: e + "px"
                    }), b(".html5gallery-elem-video-" + this.id).css({
                        width: a + "px",
                        height: e + "px"
                    }), b(".html5gallery-elem-video-container-" + this.id).css({
                        width: a + "px",
                        height: e + "px"
                    }), f = this.options.isIPhone ? e - 48 : e, b(".html5gallery-elem-video-container-" + this.id).find("video").css({
                        width: a + "px",
                        height: f + "px"
                    }), b("#html5gallery-elem-video-" +
                        this.id).css({
                        width: a + "px",
                        height: e + "px"
                    }), b("#html5gallery-elem-video-" + this.id).attr("width", a), b("#html5gallery-elem-video-" + this.id).attr("height", e), b(".html5gallery-elem-video-" + this.id).find("iframe").attr("width", a), b(".html5gallery-elem-video-" + this.id).find("iframe").attr("height", e), b("#html5gallery-elem-video-" + this.id).find("iframe").attr("width", a), b("#html5gallery-elem-video-" + this.id).find("iframe").attr("height", e);
                    f = a = 0;
                    "bottom" == this.options.headerpos && (a = this.options.titleoverlay ?
                        this.options.height - this.options.titleheight : this.options.height, f = this.options.titleoverlay ? this.options.height : this.options.height + this.options.titleheight);
                    e = this.options.slideshadow ? this.options.boxWidth - 8 : this.options.boxWidth;
                    b(".html5gallery-title-" + this.id).css({
                        width: e + "px"
                    });
                    this.options.titleoverlay || b(".html5gallery-title-" + this.id).css({
                        top: a + "px"
                    });
                    b(".html5gallery-viral-" + this.id).css({
                        top: f + "px"
                    });
                    b(".html5gallery-timer-" + this.id).css({
                        top: String(this.options.elemTop + this.options.height -
                            2) + "px"
                    });
                    this.options.showcarousel && (b(".html5gallery-car-" + this.id).css({
                            width: this.options.width + "px",
                            top: this.options.carouselTop + "px"
                        }), a = 4, this.options.slideshadow && (a += 12), b(".html5gallery-car-list-" + this.id).css({
                            width: String(this.options.width - a - 4) + "px"
                        }), this.options.carouselNavButton = !1, Math.floor((this.options.width - a - 4) / (this.options.thumbwidth + this.options.thumbgap)) < this.elemArray.length && (this.options.carouselNavButton = !0), f = this.options.carouselNavButton ? 2 * this.options.carouselarrowwidth +
                        8 : 0, b(".html5gallery-car-left-" + this.id).css({
                            display: this.options.carouselNavButton ? "block" : "none"
                        }), b(".html5gallery-car-right-" + this.id).css({
                            display: this.options.carouselNavButton ? "block" : "none"
                        }), this.options.thumbShowNum = Math.floor((this.options.width - a - 4 - f) / (this.options.thumbwidth + this.options.thumbgap)), this.options.thumbMaskWidth = this.options.thumbShowNum * this.options.thumbwidth + this.options.thumbShowNum * this.options.thumbgap, this.options.thumbTotalWidth = this.elemArray.length * this.options.thumbwidth +
                        (this.elemArray.length - 1) * this.options.thumbgap, f = 0, this.options.carouselmultirows ? "samecolumn" == this.options.thumbresponsive ? (b(".html5gallery-thumbs-" + this.id).css({
                            "margin-left": "0px",
                            width: String((this.options.thumbwidth + this.options.thumbgap) * this.options.carouselcolumn) + "px"
                        }), b(".html5gallery-tn-" + this.id).css({
                            width: this.options.thumbwidth + "px",
                            height: this.options.thumbheight + "px"
                        }), b(".html5gallery-tn-selected-" + this.id).css({
                            width: this.options.thumbwidth + "px",
                            height: this.options.thumbheight +
                                "px"
                        }), b(".html5gallery-tn-img-" + this.id).css({
                            width: String(this.options.thumbimagewidth + 2 * this.options.thumbimageborder) + "px",
                            height: String(this.options.thumbimageheight + 2 * this.options.thumbimageborder) + "px"
                        }), b(".html5gallery-tn-image-" + this.id).parent().css({
                            width: this.options.thumbimagewidth + "px",
                            height: this.options.thumbimageheight + "px"
                        }), b(".html5gallery-tn-image-" + this.id).css({
                            width: this.options.thumbimagewidth + "px",
                            height: "auto"
                        }), this.options.thumbshowtitle && b(".html5gallery-tn-title-" +
                            this.id).css({
                            width: String(this.options.thumbwidth - 2) + "px"
                        })) : (f = Math.floor(this.options.width / (this.options.thumbwidth + this.options.thumbgap)), 1 > f && (f = 1), f = (this.options.width - f * this.options.thumbwidth - (f - 1) * this.options.thumbgap) / 2, b(".html5gallery-thumbs-" + this.id).css({
                            "margin-left": f + "px",
                            width: this.options.width + "px"
                        })) : (this.options.thumbMaskWidth > this.options.thumbTotalWidth && (f = this.options.thumbMaskWidth / 2 - this.options.thumbTotalWidth / 2 - this.options.thumbgap / 2), b(".html5gallery-thumbs-" +
                            this.id).css({
                            "margin-left": f + "px",
                            width: String(this.elemArray.length * (this.options.thumbwidth + this.options.thumbgap)) + "px"
                        })), a = Math.round((this.options.width - a - 4) / 2 - this.options.thumbMaskWidth / 2), b(".html5gallery-car-mask-" + this.id).css({
                            left: a + "px",
                            width: this.options.thumbMaskWidth + "px"
                        }), this.carouselHighlight(this.curElem, !0))
                }
            },
            createStyleDefault: function() {
                if ("samecolumn" == this.options.thumbresponsive) {
                    this.options.thumboriginalwidth = this.options.thumbwidth;
                    this.options.thumboriginalheight =
                        this.options.thumbheight;
                    this.options.carouselcolumn = this.options.thumbcolumns;
                    if (this.options.thumbcolumnsresponsive) {
                        var a = this.options.isMobile ? Math.max(b(window).width(), b(document).width()) : b(window).width();
                        a < this.options.thumbsmallsize ? this.options.carouselcolumn = this.options.thumbsmallcolumns : a < this.options.thumbmediumsize && (this.options.carouselcolumn = this.options.thumbmediumcolumns)
                    }
                    this.options.thumbwidth = Math.min((this.options.width - this.options.thumbgap * (this.options.carouselcolumn - 1)) /
                        this.options.carouselcolumn);
                    this.options.thumbheight = this.options.thumbwidth * this.options.thumboriginalheight / this.options.thumboriginalwidth
                }
                this.options.thumbimagewidth = this.options.thumbwidth - 2 * this.options.thumbimageborder;
                this.options.thumbimageheight = this.options.thumbheight - 2 * this.options.thumbimageborder;
                this.options.thumbshowtitle && (this.options.thumbheight += this.options.thumbtitleheight);
                this.options.showtitle || (this.options.titleheight = 0);
                if (!this.options.showsocialmedia || !this.options.showfacebooklike &&
                    !this.options.showtwitter && !this.options.showgoogleplus) this.options.socialheight = 0;
                this.options.headerHeight = this.options.titleoverlay ? this.options.socialheight : this.options.titleheight + this.options.socialheight;
                this.options.boxWidth = this.options.width;
                this.options.boxHeight = this.options.height + this.options.headerHeight;
                this.options.boxLeft = this.options.padding;
                this.options.boxTop = this.options.padding;
                this.options.slideshadow && (this.options.boxWidth += 8, this.options.boxLeft -= 4, this.options.boxTop -=
                    4);
                this.options.showcarousel ? (this.options.carouselWidth = this.options.width, this.options.carouselHeight = this.options.thumbheight + 2 * this.options.thumbmargin, this.options.carouselLeft = this.options.padding, this.options.carouselTop = this.options.padding + this.options.boxHeight + this.options.carouselmargin, this.options.carouselmultirows && ("samecolumn" == this.options.thumbresponsive ? (this.options.carouselcolumn = this.options.thumbcolumns, this.options.thumbcolumnsresponsive && (a = this.options.isMobile ? Math.max(b(window).width(),
                        b(document).width()) : b(window).width(), a < this.options.thumbsmallsize ? this.options.carouselcolumn = this.options.thumbsmallcolumns : a < this.options.thumbmediumsize && (this.options.carouselcolumn = this.options.thumbmediumcolumns)), this.options.thumbwidth = Math.min((this.options.width - this.options.thumbgap * (this.options.carouselcolumn - 1)) / this.options.carouselcolumn), this.options.thumbheight = this.options.thumbwidth * this.options.thumboriginalheight / this.options.thumboriginalwidth, this.options.thumbimagewidth =
                    this.options.thumbwidth - 2 * this.options.thumbimageborder, this.options.thumbimageheight = this.options.thumbheight - 2 * this.options.thumbimageborder, this.options.thumbshowtitle && (this.options.thumbheight += this.options.thumbtitleheight)) : (this.options.carouselcolumn = Math.floor(this.options.width / (this.options.thumbwidth + this.options.thumbgap)), 1 > this.options.carouselcolumn && (this.options.carouselcolumn = 1)), this.options.carouselHeight = Math.ceil(this.elemArray.length / this.options.carouselcolumn) * (this.options.thumbheight +
                    this.options.thumbrowgap))) : (this.options.carouselWidth = 0, this.options.carouselHeight = 0, this.options.carouselLeft = 0, this.options.carouselTop = 0, this.options.carouselmargin = 0);
                this.options.totalWidth = this.options.width + 2 * this.options.padding;
                this.options.totalHeight = this.options.height + this.options.carouselHeight + this.options.carouselmargin + this.options.headerHeight + 2 * this.options.padding;
                this.options.containerWidth = this.options.totalWidth;
                this.options.containerHeight = this.options.totalHeight;
                this.options.responsive ?
                    (this.options.originalWidth = this.options.width, this.options.originalHeight = this.options.height, this.container.css({
                        "max-width": "100%"
                    })) : this.container.css({
                        width: this.options.containerWidth,
                        height: this.options.containerHeight
                    });
                var d = 0,
                    c = 0;
                this.options.elemTop = 0;
                "top" == this.options.headerpos ? (c = 0, d = this.options.socialheight, this.options.elemTop = this.options.headerHeight) : "bottom" == this.options.headerpos && (this.options.elemTop = 0, d = this.options.titleoverlay ? this.options.height - this.options.titleheight :
                    this.options.height, c = this.options.titleoverlay ? this.options.height : this.options.height + this.options.titleheight);
                a = " .html5gallery-container-" + this.id + " { display:block; position:absolute; left:0px; top:0px; width:" + this.options.totalWidth + "px; height:" + this.options.totalHeight + "px; " + (!this.options.bgimage ? "" : "background:url('" + this.options.skinfolder + this.options.bgimage + "') center top;") + " background-color:" + this.options.bgcolor + ";}";
                this.options.galleryshadow && (a += " .html5gallery-container-" +
                    this.id + " { -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}");
                var a = a + (" .html5gallery-box-" + this.id + " {display:block; position:absolute; text-align:center; left:" + this.options.boxLeft + "px; top:" + this.options.boxTop + "px; width:" + this.options.boxWidth + "px; height:" + this.options.boxHeight + "px;}"),
                    e = Math.round(this.options.socialheight / 2 - 12),
                    a = a + (" .html5gallery-title-text-" + this.id + " " + this.options.titlecss + " .html5gallery-title-text-" + this.id +
                        " " + this.options.titlecsslink + " .html5gallery-error-" + this.id + " " + this.options.errorcss),
                    a = a + (" .html5gallery-description-text-" + this.id + " " + this.options.descriptioncss + " .html5gallery-description-text-" + this.id + " " + this.options.descriptioncsslink),
                    a = a + (" .html5gallery-fullscreen-title-" + this.id + "" + this.options.lightboxtitlecss + " .html5gallery-fullscreen-title-" + this.id + "" + this.options.lightboxtitlelinkcss),
                    a = a + (" .html5gallery-fullscreen-description-" + this.id + "" + this.options.lightboxdescriptioncss +
                        " .html5gallery-fullscreen-description-" + this.id + "" + this.options.lightboxdescriptionlinkcss),
                    a = a + (" .html5gallery-viral-" + this.id + " {display:block; overflow:hidden; position:absolute; text-align:left; top:" + c + "px; left:0px; width:" + this.options.boxWidth + "px; height:" + this.options.socialheight + "px; padding-top:" + e + "px;}"),
                    a = a + (" .html5gallery-title-" + this.id + " {display:" + (this.options.titleoverlay && this.options.titleautohide ? "none" : "block") + "; overflow:hidden; position:absolute; left:0px; width:" +
                        this.options.boxWidth + "px; "),
                    a = this.options.titleoverlay ? "top" == this.options.headerpos ? a + "top:0px; height:auto; }" : a + "bottom:0px; height:auto; }" : a + ("top:" + d + "px; height:" + this.options.titleheight + "px; }"),
                    a = a + (" .html5gallery-timer-" + this.id + " {display:block; position:absolute; top:" + String(this.options.elemTop + this.options.height - 2) + "px; left:0px; width:0px; height:2px; background-color:#ccc; filter:alpha(opacity=60); opacity:0.6; }"),
                    a = a + (" .html5gallery-elem-" + this.id + " {display:block; overflow:hidden; position:absolute; top:" +
                        this.options.elemTop + "px; left:0px;  height:" + this.options.height + "px;}");
                this.options.isIE7 || this.options.isIE6 ? (a += " .html5gallery-loading-" + this.id + " {display:none; }", a += " .html5gallery-loading-center-" + this.id + " {display:none; }") : (a += " .html5gallery-loading-" + this.id + " {display:block; position:absolute; top:4px; right:4px; width:100%; height:100%; background:url('" + this.options.skinfolder + "loading.gif') no-repeat top right;}", a += " .html5gallery-loading-center-" +
                    this.id + " {display:block; position:absolute; top:0px; left:0px; width:100%; height:100%; background:url('" + this.options.skinfolder + "loading_center.gif') no-repeat center center;}");
                0 < this.options.borderradius && (a += " .html5gallery-elem-" + this.id + " {overflow:hidden; border-radius:" + this.options.borderradius + "px; -moz-border-radius:" + this.options.borderradius + "px; -webkit-border-radius:" + this.options.borderradius + "px;}");
                this.options.slideshadow && (a += " .html5gallery-title-" + this.id + " { padding:4px;}",
                    a += " .html5gallery-timer-" + this.id + " { margin:4px;}", a += " .html5gallery-elem-" + this.id + " { overflow:hidden; padding:4px; -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}");
                this.options.showcarousel && this.options.carouselmultirows ? (a += " .html5gallery-car-" + this.id + " {      position:absolute; display:block; overflow:hidden; left:" + this.options.carouselLeft + "px; top:" + this.options.carouselTop + "px; width:" + this.options.width + "px;", a = this.options.carouselbgtransparent ?
                    a + "background-color:transparent;" : a + ("border-top:1px solid " + this.options.carouseltopborder + ";border-bottom:1px solid " + this.options.carouselbottomborder + ";background-color: " + this.options.carouselbgcolorend + "; background: " + this.options.carouselbgcolorend + " -webkit-gradient(linear, left top, left bottom, from(" + this.options.carouselbgcolorstart + "), to(" + this.options.carouselbgcolorend + ")) no-repeat; background: " + this.options.carouselbgcolorend + " -moz-linear-gradient(top, " + this.options.carouselbgcolorstart +
                        ", " + this.options.carouselbgcolorend + ") no-repeat; filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselbgcolorstart + ", endColorstr=" + this.options.carouselbgcolorend + ") no-repeat; -ms-filter: 'progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselbgcolorstart + ", endColorstr=" + this.options.carouselbgcolorend + ")' no-repeat;"), this.options.carouselbgimage && (a += "background:url('" + this.options.skinfolder + this.options.carouselbgimage + "') center top;"),
                    d = Math.floor(this.options.width / (this.options.thumbwidth + this.options.thumbgap)), 1 > d && (d = 1), c = (this.options.width - d * this.options.thumbwidth - (d - 1) * this.options.thumbgap) / 2, a = a + "}" + (".html5gallery-thumbs-" + this.id + " { position:relative; display:block; margin-left: 0 px; width:" + ("samecolumn" == this.options.thumbresponsive ? (this.options.thumbwidth + this.options.thumbgap) * this.options.carouselcolumn : this.options.width) + "px; top:0px; }"), a += " .html5gallery-tn-" + this.id + " { display:block; float:left; margin-left:0px; margin-right:20px; margin-bottom:" + this.options.thumbrowgap + "px; text-align:left; cursor:pointer; width:" + this.options.thumbwidth + "px;height:" + this.options.thumbheight + "px;overflow:hidden;}", this.options.thumbshadow && (a += " .html5gallery-tn-" + this.id + " { -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}"), a += " .html5gallery-tn-selected-" + this.id + " { display:block; float:left; margin-left:0px; margin-right:20px; margin-bottom:" +
                    this.options.thumbrowgap + "px; text-align:center; cursor:pointer; width:" + this.options.thumbwidth + "px;height:" + this.options.thumbheight + "px;overflow:hidden;}", this.options.thumbshadow && (a += " .html5gallery-tn-selected-" + this.id + " { -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}"), a += " .html5gallery-tn-" + this.id + " {background-color:" + this.options.thumbimagebordercolor + ";} .html5gallery-tn-" + this.id + " { filter:alpha(opacity=" + Math.round(100 * this.options.thumbopacity) +
                    "); opacity:" + this.options.thumbopacity + "; }  .html5gallery-tn-selected-" + this.id + " { filter:alpha(opacity=100); opacity:1; } ", a += " .html5gallery-tn-img-" + this.id + " {display:block; overflow:hidden; width:" + String(this.options.thumbimagewidth + 2 * this.options.thumbimageborder) + "px;height:" + String(this.options.thumbimageheight + 2 * this.options.thumbimageborder) + "px;}", this.options.thumbunselectedimagebordercolor && (a += " .html5gallery-tn-selected-" + this.id + " {background-color:" + this.options.thumbunselectedimagebordercolor +
                        ";}"), this.options.thumbshowtitle ? (a += " .html5gallery-tn-title-" + this.id + " {display:block; overflow:hidden; float:top; height:" + this.options.thumbtitleheight + "px;width:" + String(this.options.thumbwidth - 2) + "px;line-height:" + this.options.thumbtitleheight + "px;}", a += " .html5gallery-tn-title-" + this.id + this.options.thumbtitlecss) : a += " .html5gallery-tn-title-" + this.id + " {display:none;}", this.carouselHighlight = function() {}) : this.options.showcarousel ? (a += " .html5gallery-car-" + this.id + " { position:absolute; display:block; overflow:hidden; left:" +
                    this.options.carouselLeft + "px; top:" + this.options.carouselTop + "px; width:" + this.options.width + "px; height:" + this.options.carouselHeight + "px;", a = this.options.carouselbgtransparent ? a + "background-color:transparent;" : a + ("border-top:1px solid " + this.options.carouseltopborder + ";border-bottom:1px solid " + this.options.carouselbottomborder + ";background-color: " + this.options.carouselbgcolorend + "; background: " + this.options.carouselbgcolorend + " -webkit-gradient(linear, left top, left bottom, from(" + this.options.carouselbgcolorstart +
                        "), to(" + this.options.carouselbgcolorend + ")) no-repeat; background: " + this.options.carouselbgcolorend + " -moz-linear-gradient(top, " + this.options.carouselbgcolorstart + ", " + this.options.carouselbgcolorend + ") no-repeat; filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselbgcolorstart + ", endColorstr=" + this.options.carouselbgcolorend + ") no-repeat; -ms-filter: 'progid:DXImageTransform.Microsoft.gradient(startColorstr=" + this.options.carouselbgcolorstart + ", endColorstr=" +
                        this.options.carouselbgcolorend + ")' no-repeat;"), this.options.carouselbgimage && (a += "background:url('" + this.options.skinfolder + this.options.carouselbgimage + "') center top;"), a += "}", d = 4, this.options.slideshadow && (d += 12), a += " .html5gallery-car-list-" + this.id + " { position:absolute; display:block; overflow:hidden; left:" + d + "px; width:" + String(this.options.width - d - 4) + "px; top:0px; height:" + this.options.carouselHeight + "px; }", this.options.carouselNavButton = !1, Math.floor((this.options.width - d - 4) / (this.options.thumbwidth +
                        this.options.thumbgap)) < this.elemArray.length && (this.options.carouselNavButton = !0), a += " .html5gallery-car-left-" + this.id + " { position:absolute; overflow:hidden; width:" + this.options.carouselarrowwidth + "px; height:" + this.options.carouselarrowheight + "px; left:0px; top:" + String(this.options.carouselHeight / 2 - this.options.carouselarrowheight / 2) + "px; background:url('" + this.options.skinfolder + "carousel_left.png') no-repeat 0px 0px;}  .html5gallery-car-right-" + this.id + " { position:absolute; overflow:hidden; width:" +
                    this.options.carouselarrowwidth + "px; height:" + this.options.carouselarrowheight + "px; right:0px; top:" + String(this.options.carouselHeight / 2 - this.options.carouselarrowheight / 2) + "px; background:url('" + this.options.skinfolder + "carousel_right.png') no-repeat 0px 0px;} ", c = this.options.carouselNavButton ? 2 * this.options.carouselarrowwidth + 8 : 0, b(".html5gallery-car-left-" + this.id).css({
                        display: this.options.carouselNavButton ? "block" : "none"
                    }), b(".html5gallery-car-right-" + this.id).css({
                        display: this.options.carouselNavButton ?
                            "block" : "none"
                    }), this.options.thumbShowNum = Math.floor((this.options.width - d - 4 - c) / (this.options.thumbwidth + this.options.thumbgap)), this.options.thumbMaskWidth = this.options.thumbShowNum * this.options.thumbwidth + this.options.thumbShowNum * this.options.thumbgap, this.options.thumbTotalWidth = this.elemArray.length * this.options.thumbwidth + (this.elemArray.length - 1) * this.options.thumbgap, c = 0, this.options.thumbMaskWidth > this.options.thumbTotalWidth && (c = this.options.thumbMaskWidth / 2 - this.options.thumbTotalWidth /
                        2 - this.options.thumbgap / 2), a += ".html5gallery-thumbs-" + this.id + " { position:relative; display:block; margin-left:" + c + "px; width:" + String(this.elemArray.length * (this.options.thumbwidth + this.options.thumbgap)) + "px; top:" + Math.round(this.options.carouselHeight / 2 - this.options.thumbheight / 2) + "px; }", d = Math.round((this.options.width - d - 4) / 2 - this.options.thumbMaskWidth / 2), a += " .html5gallery-car-mask-" + this.id + " { position:absolute; display:block; text-align:left; overflow:hidden; left:" + d + "px; width:" + this.options.thumbMaskWidth +
                    "px; top:0px; height:" + this.options.carouselHeight + "px;} ", a += " .html5gallery-tn-" + this.id + " { display:block; float:left; margin-left:" + Math.floor(this.options.thumbgap / 2) + "px; margin-right:" + Math.floor(this.options.thumbgap / 2) + "px; text-align:center; cursor:pointer; width:" + this.options.thumbwidth + "px;height:" + this.options.thumbheight + "px;overflow:hidden;}", this.options.thumbshadow && (a += " .html5gallery-tn-" + this.id + " { -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}"),
                    a += " .html5gallery-tn-selected-" + this.id + " { display:block; float:left; margin-left:" + Math.floor(this.options.thumbgap / 2) + "px; margin-right:" + Math.floor(this.options.thumbgap / 2) + "px;text-align:center; cursor:pointer; width:" + this.options.thumbwidth + "px;height:" + this.options.thumbheight + "px;overflow:hidden;}", this.options.thumbshadow && (a += " .html5gallery-tn-selected-" + this.id + " { -moz-box-shadow: 0px 2px 5px #aaa; -webkit-box-shadow: 0px 2px 5px #aaa; box-shadow: 0px 2px 5px #aaa;}"), a += " .html5gallery-tn-" +
                    this.id + " {background-color:" + this.options.thumbimagebordercolor + ";} .html5gallery-tn-" + this.id + " { filter:alpha(opacity=" + Math.round(100 * this.options.thumbopacity) + "); opacity:" + this.options.thumbopacity + "; }  .html5gallery-tn-selected-" + this.id + " { filter:alpha(opacity=100); opacity:1; } ", a += " .html5gallery-tn-img-" + this.id + " {display:block; overflow:hidden; width:" + String(this.options.thumbimagewidth + 2 * this.options.thumbimageborder) + "px;height:" + String(this.options.thumbimageheight + 2 * this.options.thumbimageborder) +
                    "px;}", this.options.thumbunselectedimagebordercolor && (a += " .html5gallery-tn-selected-" + this.id + " {background-color:" + this.options.thumbunselectedimagebordercolor + ";}"), this.options.thumbshowtitle ? (a += " .html5gallery-tn-title-" + this.id + " {display:block; overflow:hidden; float:top; height:" + this.options.thumbtitleheight + "px;width:" + String(this.options.thumbwidth - 2) + "px;line-height:" + this.options.thumbtitleheight + "px;}", a += " .html5gallery-tn-title-" + this.id + this.options.thumbtitlecss) : a += " .html5gallery-tn-title-" +
                    this.id + " {display:none;}", this.carouselHighlight = function(a, d) {
                        b("#html5gallery-tn-" + this.id + "-" + a, this.$gallery).removeClass("html5gallery-tn-" + this.id).addClass("html5gallery-tn-selected-" + this.id);
                        if (this.options.thumbShowNum >= this.elemArray.length) b(".html5gallery-car-left-" + this.id, this.$gallery).css({
                            "background-position": "-" + String(2 * this.options.carouselarrowwidth) + "px 0px",
                            cursor: ""
                        }), b(".html5gallery-car-left-" + this.id, this.$gallery).data("disabled", !0), b(".html5gallery-car-right-" + this.id,
                            this.$gallery).css({
                            "background-position": "-" + String(2 * this.options.carouselarrowwidth) + "px 0px",
                            cursor: ""
                        }), b(".html5gallery-car-right-" + this.id, this.$gallery).data("disabled", !0);
                        else {
                            var c = Math.floor(a / this.options.thumbShowNum) * this.options.thumbShowNum * (this.options.thumbwidth + this.options.thumbgap);
                            c >= this.options.thumbTotalWidth - this.options.thumbMaskWidth + this.options.thumbgap && (c = this.options.thumbTotalWidth - this.options.thumbMaskWidth + this.options.thumbgap);
                            c = -c;
                            d ? b(".html5gallery-thumbs-" +
                                this.id, this.$gallery).css({
                                marginLeft: c
                            }) : b(".html5gallery-thumbs-" + this.id, this.$gallery).animate({
                                marginLeft: c
                            }, 500);
                            this.updateCarouseButtons(c)
                        }
                    }, this.carouselPrev = function() {
                        var a = b(".html5gallery-thumbs-" + this.id, this.$gallery);
                        if (0 != parseInt(a.css("margin-left"))) {
                            var d = -1 * parseInt(a.css("margin-left")) - this.options.thumbShowNum * (this.options.thumbwidth + this.options.thumbgap);
                            0 > d && (d = 0);
                            a.animate({
                                marginLeft: -d
                            }, 500, this.options.carouseleasing);
                            this.updateCarouseButtons(-d)
                        }
                    }, this.carouselNext =
                    function() {
                        var a = b(".html5gallery-thumbs-" + this.id, this.$gallery);
                        if (parseInt(a.css("margin-left")) != -(this.options.thumbTotalWidth - this.options.thumbMaskWidth + this.options.thumbgap)) {
                            var d = -1 * parseInt(a.css("margin-left")) + this.options.thumbShowNum * (this.options.thumbwidth + this.options.thumbgap);
                            d >= this.options.thumbTotalWidth - this.options.thumbMaskWidth + this.options.thumbgap && (d = this.options.thumbTotalWidth - this.options.thumbMaskWidth + this.options.thumbgap);
                            a.animate({
                                marginLeft: -d
                            }, 500, this.options.carouseleasing);
                            this.updateCarouseButtons(-d)
                        }
                    }, this.updateCarouseButtons = function(a) {
                        var d = b(".html5gallery-car-left-" + this.id, this.$gallery),
                            c = b(".html5gallery-car-right-" + this.id, this.$gallery),
                            e = -1 * (this.options.thumbTotalWidth - this.options.thumbMaskWidth + this.options.thumbgap);
                        0 == a ? (d.css({
                            "background-position": "-" + String(2 * this.options.carouselarrowwidth) + "px 0px",
                            cursor: ""
                        }), d.data("disabled", !0)) : d.data("disabled") && (d.css({
                            "background-position": "0px 0px",
                            cursor: "pointer"
                        }), d.data("disabled", !1));
                        a == e ? (c.css({
                            "background-position": "-" +
                                String(2 * this.options.carouselarrowwidth) + "px 0px",
                            cursor: ""
                        }), c.data("disabled", !0)) : c.data("disabled") && (c.css({
                            "background-position": "0px 0px",
                            cursor: "pointer"
                        }), c.data("disabled", !1))
                    }) : a += " .html5gallery-car-" + this.id + " { display:none; }";
                a += ".html5gallery-container-" + this.id + " div {box-sizing:content-box;}";
                b("head").append("<style type='text/css' data-creator='html5gallery'>" + a + "</style>")
            },
            loadCarousel: function() {
                var a = this,
                    d = b(".html5gallery-thumbs-" + this.id, this.$gallery);
                d.empty();
                for (var c =
                        0; c < this.elemArray.length; c++) {
                    var e = b("<div id='html5gallery-tn-" + this.id + "-" + c + "' class='html5gallery-tn-" + this.id + "' data-index=" + c + " ></div>");
                    e.appendTo(d);
                    this.options.thumblinkintitle || e.unbind("click").click(function() {
                        a.onThumbClick(b(this).data("index"));
                        a.slideRun(b(this).data("index"), !0, !0)
                    });
                    e.hover(function() {
                        a.onThumbOver();
                        b(this).removeClass("html5gallery-tn-" + a.id).addClass("html5gallery-tn-selected-" + a.id)
                    }, function() {
                        b(this).data("index") !== a.curElem && b(this).removeClass("html5gallery-tn-selected-" +
                            a.id).addClass("html5gallery-tn-" + a.id)
                    });
                    e = new Image;
                    e.data = c;
                    b(e).load(function() {
                        var c = Math.max(a.options.thumbimagewidth / this.width, a.options.thumbimageheight / this.height),
                            e = Math.round(c * this.width),
                            c = Math.round(c * this.height),
                            l = a.options.thumbshowplayonvideo && 1 != a.elemArray[this.data][9] ? "<div class='html5gallery-tn-img-play-" + a.id + "' style='display:block; overflow:hidden; position:absolute; width:100%;height:100%; top:" + a.options.thumbimageborder + "px; left:" + a.options.thumbimageborder + 'px;background:url("' +
                            a.options.skinfolder + "playvideo.png\") no-repeat center center;'></div>" : "";
                        a.options.carouselmultirows && "samecolumn" == a.options.thumbresponsive ? b("#html5gallery-tn-" + a.id + "-" + this.data, d).append("<div class='html5gallery-tn-img-" + a.id + "' style='position:relative;width:" + String(a.options.thumbimagewidth + 2 * a.options.thumbimageborder) + "px;height:" + String(a.options.thumbimageheight + 2 * a.options.thumbimageborder) + "px;'><div style='display:block; overflow:hidden; position:absolute; width:" + a.options.thumbimagewidth +
                            "px;height:" + a.options.thumbimageheight + "px; top:" + a.options.thumbimageborder + "px; left:" + a.options.thumbimageborder + "px;'><img class='html5gallery-tn-image-" + a.id + "' style='border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:" + e + "px; height:" + c + "px;' src='" + a.elemArray[this.data][1] + "' /></div>" + l + "</div><div class='html5gallery-tn-title-" + a.id + "' style='width:" + String(a.options.thumbwidth - 2) + "px;'>" + a.elemArray[this.data][7] + (a.options.thumbshowdescription ? "<br /><span class='html5gallery-tn-description-" +
                                a.id + "'>" + a.elemArray[this.data][8] + "</span>" : "") + "</div>") : b("#html5gallery-tn-" + a.id + "-" + this.data, d).append("<div class='html5gallery-tn-img-" + a.id + "' style='position:relative;'><div style='display:block; overflow:hidden; position:absolute; width:" + a.options.thumbimagewidth + "px;height:" + a.options.thumbimageheight + "px; top:" + a.options.thumbimageborder + "px; left:" + a.options.thumbimageborder + "px;'><img class='html5gallery-tn-image-" + a.id + "' style='border:none; padding:0px; margin:0px; max-width:100%; max-height:none; width:" +
                            e + "px; height:" + c + "px;' src='" + a.elemArray[this.data][1] + "' /></div>" + l + "</div><div class='html5gallery-tn-title-" + a.id + "'>" + a.elemArray[this.data][7] + (a.options.thumbshowdescription ? "<br /><span class='html5gallery-tn-description-" + a.id + "'>" + a.elemArray[this.data][8] + "</span>" : "") + "</div>");
                        a.options.thumblinkintitle && b(".html5gallery-tn-img-" + a.id, d).unbind("click").click(function() {
                            a.onThumbClick(b(this).parent().data("index"));
                            a.slideRun(b(this).parent().data("index"), !0, !0)
                        })
                    });
                    e.src = this.elemArray[c][1]
                }
                this.options.carouselmultirows &&
                    d.append("<div style='clear:both;'></div>")
            },
            goNormal: function() {
                clearTimeout(this.slideshowTimeout);
                b(document).unbind("keyup.html5gallery");
                b(".html5gallery-timer-" + this.id, this.$gallery).css({
                    width: 0
                });
                clearInterval(this.slideTimer);
                this.slideTimerCount = 0;
                this.isFullscreen = !1;
                var a = b(".html5gallery-elem-" + this.id, this.$fullscreen).empty().css({
                    top: this.options.elemTop
                });
                b(".html5gallery-box-" + this.id, this.$gallery).prepend(a);
                this.slideRun(this.curElem);
                this.$fullscreen.remove();
                "show" == this.options.imagetoolboxmode ?
                    this.showimagetoolbox(this.elemArray[this.curElem][9]) : this.hideimagetoolbox()
            },
            goFullscreen: function() {
                this.hideimagetoolbox();
                clearTimeout(this.slideshowTimeout);
                b(".html5gallery-fullscreen-timer-" + this.id, this.$fullscreen).css({
                    width: 0
                });
                clearInterval(this.slideTimer);
                this.slideTimerCount = 0;
                this.isFullscreen = !0;
                this.fullscreenInitial = 20;
                this.fullscreenMargin = this.options.lightboxborder;
                this.fullscreenBarH = this.options.lightboxtextheight;
                this.fullscreenOutsideMargin = this.options.lightboxmargin;
                var a = this.options.isMobile ? Math.max(b(window).width(), b(document).width()) : b(window).width(),
                    d = this.elemArray[this.curElem][10],
                    c = this.elemArray[this.curElem][11];
                this.fullscreenWidth = a - 2 * this.fullscreenMargin - 2 * this.fullscreenOutsideMargin;
                var e = window.innerHeight ? window.innerHeight : b(window).height();
                this.fullscreenHeight = e - 2 * this.fullscreenMargin - this.fullscreenBarH - 2 * this.fullscreenOutsideMargin;
                var f = Math.max(e, b(document).height()),
                    h = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17],
                        this.fullscreenWidth) : this.fullscreenWidth,
                    j = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : this.fullscreenHeight,
                    h = Math.min(h / d, j / c);
                1 > h && (d *= h, c *= h);
                e = b(window).scrollTop() + Math.round((e - (c + 2 * this.fullscreenMargin + this.fullscreenBarH)) / 2);
                this.$fullscreen = b("<div class='html5gallery-fullscreen-" + this.id + "' style='position:absolute;top:0px;left:0px;width:" + a + "px;height:" + f + "px;text-align:center;z-index:99999;'><div class='html5gallery-fullscreen-overlay-" +
                    this.id + "' style='display:block;position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:#000000;opacity:0.9;filter:alpha(opacity=80);'></div><div class='html5gallery-fullscreen-box-" + this.id + "' style='display:block;overflow:hidden;position:relative;margin:0px auto;top:" + e + "px;width:" + this.fullscreenInitial + "px;height:" + this.fullscreenInitial + "px;'><div class='html5gallery-fullscreen-elem-" + this.id + "' style='display:block;position:relative;overflow:hidden;width:" + String(d + 2 * this.fullscreenMargin) +
                    "px;height:" + String(c + 2 * this.fullscreenMargin) + "px;background-color:" + this.options.lightboxbgcolor + ";'><div class='html5gallery-fullscreen-elem-wrapper-" + this.id + "' style='display:block;position:relative;overflow:hidden;margin:" + this.fullscreenMargin + "px;'><div class='html5gallery-fullscreen-timer-" + this.id + "' style='display:block; position:absolute; top:" + String(c - 4) + "px; left:0px; width:0px; height:4px; background-color:#666; filter:alpha(opacity=60); opacity:0.6;'></div></div></div><div class='html5gallery-fullscreen-bar-" +
                    this.id + "' style='display:block;position:relative;width:" + String(d + 2 * this.fullscreenMargin) + "px;height:auto;min-height:36px;background-color:" + this.options.lightboxbgcolor + ";'><div class='html5gallery-fullscreen-bar-wrapper-" + this.id + "' style='display:block;position:relative;padding:0px " + this.fullscreenMargin + "px " + this.fullscreenMargin + "px " + this.fullscreenMargin + "px;'><div class='html5gallery-fullscreen-close-" + this.id + "' style='display:block;position:relative;float:right;cursor:pointer;width:32px;height:32px;top:0px;background-image:url(\"" +
                    this.options.skinfolder + "lightbox_close.png\");'></div><div class='html5gallery-fullscreen-play-" + this.id + "' style='display:" + (this.isPaused && 1 < this.elemArray.length && 1 == this.elemArray[this.curElem][9] ? "block" : "none") + ';position:relative;float:right;cursor:pointer;width:32px;height:32px;top:0px;background-image:url("' + this.options.skinfolder + "lightbox_play.png\");'></div><div class='html5gallery-fullscreen-pause-" + this.id + "' style='display:" + (this.isPaused || 1 >= this.elemArray.length || 1 != this.elemArray[this.curElem][9] ?
                        "none" : "block") + ';position:relative;float:right;cursor:pointer;width:32px;height:32px;top:0px;background-image:url("' + this.options.skinfolder + "lightbox_pause.png\");'></div><div class='html5gallery-fullscreen-title-" + this.id + "' style='display:block;position:relative;float:left;width:" + String(d - 2 * this.fullscreenMargin - 72) + "px;height:auto;top:0px;left:0px;text-align:left;'></div><div style='clear:both;'></div></div></div><div class='html5gallery-fullscreen-next-" + this.id + "' style='display:none;position:absolute;cursor:pointer;width:48px;height:48px;right:" +
                    this.fullscreenMargin + "px;top:" + Math.round(c / 2) + 'px;background-image:url("' + this.options.skinfolder + "lightbox_next.png\");'></div><div class='html5gallery-fullscreen-prev-" + this.id + "' style='display:none;position:absolute;cursor:pointer;width:48px;height:48px;left:" + this.fullscreenMargin + "px;top:" + Math.round(c / 2) + 'px;background-image:url("' + this.options.skinfolder + "lightbox_prev.png\");'></div></div></div>");
                this.$fullscreen.appendTo("body");
                var g = this;
                b(window).scroll(function() {
                    var a = b(".html5gallery-fullscreen-box-" +
                            g.id, g.$fullscreen),
                        d = window.innerHeight ? window.innerHeight : b(window).height(),
                        d = b(window).scrollTop() + Math.round((d - a.height()) / 2);
                    a.css({
                        top: d
                    })
                });
                var k = b(".html5gallery-elem-" + this.id, this.$gallery).empty().css({
                    top: 0,
                    position: "relative"
                });
                b(".html5gallery-fullscreen-box-" + this.id, this.$fullscreen).animate({
                    height: c + 2 * this.fullscreenMargin
                }, "slow", function() {
                    b(this).animate({
                        width: d + 2 * g.fullscreenMargin
                    }, "slow", function() {
                        b(this).animate({
                            height: "+=" + g.fullscreenBarH
                        }, "slow", function() {
                            b(".html5gallery-fullscreen-elem-wrapper-" +
                                g.id, g.$fullscreen).prepend(k);
                            g.slideRun(g.curElem)
                        })
                    })
                });
                b(".html5gallery-fullscreen-overlay-" + this.id, this.$fullscreen).click(function() {
                    g.goNormal()
                });
                b(".html5gallery-fullscreen-box-" + this.id, this.$fullscreen).hover(function() {
                    1 < g.elemArray.length && (b(".html5gallery-fullscreen-next-" + g.id, g.$fullscreen).fadeIn(), b(".html5gallery-fullscreen-prev-" + g.id, g.$fullscreen).fadeIn())
                }, function() {
                    b(".html5gallery-fullscreen-next-" + g.id, g.$fullscreen).fadeOut();
                    b(".html5gallery-fullscreen-prev-" + g.id,
                        g.$fullscreen).fadeOut()
                });
                b(".html5gallery-fullscreen-box-" + this.id, this.$fullscreen).touchSwipe({
                    preventWebBrowser: !0,
                    swipeLeft: function() {
                        g.disableTouchSwipe || g.slideRun(-1)
                    },
                    swipeRight: function() {
                        g.disableTouchSwipe || g.slideRun(-2)
                    }
                });
                b(".html5gallery-fullscreen-close-" + this.id, this.$fullscreen).click(function() {
                    g.goNormal()
                });
                b(".html5gallery-fullscreen-next-" + this.id, this.$fullscreen).click(function() {
                    g.slideRun(-1)
                });
                b(".html5gallery-fullscreen-prev-" + this.id, this.$fullscreen).click(function() {
                    g.slideRun(-2)
                });
                b(".html5gallery-fullscreen-play-" + this.id, this.$fullscreen).click(function() {
                    b(".html5gallery-fullscreen-play-" + g.id, g.$fullscreen).hide();
                    b(".html5gallery-fullscreen-pause-" + g.id, g.$fullscreen).show();
                    g.isPaused = !1;
                    g.slideshowTimeout = setTimeout(function() {
                        g.slideRun(-1)
                    }, g.elemArray[g.curElem][16] ? g.elemArray[g.curElem][16] : g.options.slideshowinterval);
                    b(".html5gallery-fullscreen-timer-" + g.id, g.$fullscreen).css({
                        width: 0
                    });
                    g.slideTimerCount = 0;
                    g.options.showtimer && (g.slideTimer = setInterval(function() {
                            g.showSlideTimer()
                        },
                        50))
                });
                b(".html5gallery-fullscreen-pause-" + this.id, this.$fullscreen).click(function() {
                    b(".html5gallery-fullscreen-play-" + g.id, g.$fullscreen).show();
                    b(".html5gallery-fullscreen-pause-" + g.id, g.$fullscreen).hide();
                    g.isPaused = !0;
                    clearTimeout(g.slideshowTimeout);
                    b(".html5gallery-fullscreen-timer-" + g.id, g.$fullscreen).css({
                        width: 0
                    });
                    clearInterval(g.slideTimer);
                    g.slideTimerCount = 0
                });
                b(document).bind("keyup.html5gallery", function(a) {
                    27 == a.keyCode ? g.goNormal() : 39 == a.keyCode ? g.slideRun(-1) : 37 == a.keyCode && g.slideRun(-2)
                })
            },
            calcIndex: function(a) {
                this.savedElem = this.curElem; - 2 == a ? (this.nextElem = this.curElem, this.curElem = this.prevElem, this.prevElem = 0 > this.curElem - 1 ? this.elemArray.length - 1 : this.curElem - 1) : -1 == a ? (this.prevElem = this.curElem, this.curElem = this.nextElem, this.nextElem = this.curElem + 1 >= this.elemArray.length ? 0 : this.curElem + 1) : 0 <= a && (this.curElem = a, this.prevElem = 0 > this.curElem - 1 ? this.elemArray.length - 1 : this.curElem - 1, this.nextElem = this.curElem + 1 >= this.elemArray.length ? 0 : this.curElem + 1)
            },
            showSlideTimer: function() {
                var a =
                    this.elemArray[this.curElem][16] ? this.elemArray[this.curElem][16] : this.options.slideshowinterval;
                this.slideTimerCount++;
                this.isFullscreen ? b(".html5gallery-fullscreen-timer-" + this.id, this.$fullscreen).width(Math.round(50 * b(".html5gallery-fullscreen-elem-wrapper-" + this.id, this.$fullscreen).width() * (this.slideTimerCount + 1) / a)) : b(".html5gallery-timer-" + this.id, this.$gallery).width(Math.round(50 * this.options.boxWidth * (this.slideTimerCount + 1) / a))
            },
            setHd: function(a, b) {
                var c = this.elemArray[this.curElem][9],
                    c = this.isHd != a && b && (5 == c || 6 == c || 7 == c || 8 == c);
                this.isHd = a;
                c && this.slideRun(this.curElem, !1, !1, !0)
            },
            enableUpdateCarousel: function() {
                this.disableupdatecarousel = !1
            },
            slideRun: function(a, d, c, e) {
                clearTimeout(this.slideshowTimeout);
                this.isFullscreen ? b(".html5gallery-fullscreen-timer-" + this.id, this.$fullscreen).css({
                    width: 0
                }) : b(".html5gallery-timer-" + this.id, this.$gallery).css({
                    width: 0
                });
                clearInterval(this.slideTimer);
                this.slideTimerCount = 0;
                this.options.showcarousel && 0 <= this.curElem && b("#html5gallery-tn-" +
                    this.id + "-" + this.curElem, this.$gallery).removeClass("html5gallery-tn-selected-" + this.id).addClass("html5gallery-tn-" + this.id);
                this.calcIndex(a);
                this.options.socialurlforeach && this.createSocialMedia();
                !this.isFullscreen && this.options.showcarousel && (b("#html5gallery-tn-" + this.id + "-" + this.curElem, this.$gallery).removeClass("html5gallery-tn-" + this.id).addClass("html5gallery-tn-selected-" + this.id), !this.options.notupdatecarousel && !this.disableupdatecarousel && this.carouselHighlight(this.curElem));
                if (this.options.showtitle ||
                    this.options.lightboxshowtitle || this.options.lightboxshowdescription) {
                    a = this.elemArray[this.curElem][7];
                    var f = this.elemArray[this.curElem][8];
                    this.options.shownumbering && (a = this.options.numberingformat.replace("%NUM", this.curElem + 1).replace("%TOTAL", this.elemArray.length) + " " + a);
                    if (this.isFullscreen) {
                        var h = "";
                        this.options.lightboxshowtitle && a && (h += a);
                        this.options.lightboxshowdescription && f && (h += "<div class='html5gallery-fullscreen-description-" + this.id + "'>" + f + "</div>");
                        b(".html5gallery-fullscreen-title-" +
                            this.id, this.$fullscreen).html(h)
                    } else this.options.showtitle && (h = "", a && (h += "<div class='html5gallery-title-text-" + this.id + "'>" + a + "</div>"), this.options.showdescription && f && (h += "<div class='html5gallery-description-text-" + this.id + "'>" + f + "</div>"), b(".html5gallery-title-" + this.id, this.$gallery).html(h))
                }
                a = this.elemArray[this.curElem][9];
                if (!(0 > a)) {
                    !this.isFullscreen && d ? "always" == this.options.showimagetoolbox ? ("mouseover" == this.options.imagetoolboxmode || "show" == this.options.imagetoolboxmode) && this.showimagetoolbox(a) :
                        "image" == this.options.showimagetoolbox && 1 != a && this.hideimagetoolbox() : "show" == this.options.imagetoolboxmode ? this.showimagetoolbox(a) : this.hideimagetoolbox();
                    this.onChange();
                    d = b(".html5gallery-elem-" + this.id, j);
                    d.find("iframe").each(function() {
                        b(this).attr("src", "")
                    });
                    d.find("video").each(function() {
                        b(this).attr("src", "")
                    });
                    this.disableTouchSwipe = !1;
                    c = this.options.autoplayvideo || this.options.playvideoonclick && c || e;
                    var j = this.isFullscreen ? this.$fullscreen : this.$gallery;
                    this.showingPoster = !1;
                    (5 == a ||
                        6 == a || 7 == a || 8 == a || 9 == a || 10 == a || 11 == a) && !c && this.elemArray[this.curElem][12] ? (this.showingPoster = !0, this.showPoster()) : (b(".html5gallery-video-play-" + this.id, j).length && b(".html5gallery-video-play-" + this.id, j).remove(), 1 == a ? this.showImage() : 5 == a || 6 == a || 7 == a || 8 == a ? this.showVideo(c, e) : 9 == a ? this.showYoutube(c) : 10 == a ? this.showVimeo(c) : 11 == a ? this.showEmbedVideo(c) : 2 == a ? this.showSWF() : 12 == a && this.showIframe());
                    this.prevElem in this.elemArray && 1 == this.elemArray[this.prevElem][9] && ((new Image).src = this.elemArray[this.prevElem][2]);
                    this.nextElem in this.elemArray && 1 == this.elemArray[this.nextElem][9] && ((new Image).src = this.elemArray[this.nextElem][2]);
                    this.prevElem in this.elemArray && (!this.options.autoplayvideo && this.elemArray[this.prevElem][12]) && ((new Image).src = this.elemArray[this.prevElem][12]);
                    this.nextElem in this.elemArray && (!this.options.autoplayvideo && this.elemArray[this.nextElem][12]) && ((new Image).src = this.elemArray[this.nextElem][12]);
                    this.curElem == this.elemArray.length - 1 && this.looptimes++;
                    var g = this;
                    if ((1 == a || this.showingPoster) &&
                        !this.isPaused && 1 < this.elemArray.length && (!this.options.loop || this.looptimes < this.options.loop)) this.slideshowTimeout = setTimeout(function() {
                        g.slideRun(-1)
                    }, this.elemArray[this.curElem][16] ? this.elemArray[this.curElem][16] : this.options.slideshowinterval), this.isFullscreen ? b(".html5gallery-fullscreen-timer-" + this.id, this.$fullscreen).css({
                        width: 0
                    }) : b(".html5gallery-timer-" + this.id, this.$gallery).css({
                        width: 0
                    }), this.slideTimerCount = 0, this.options.showtimer && (this.slideTimer = setInterval(function() {
                            g.showSlideTimer()
                        },
                        50));
                    this.options.loop && this.looptimes >= this.options.loop && (this.looptimes = 0, this.pauseGallery());
                    this.options.lightbox || this.elemArray[this.curElem][5] || this.elemArray[this.curElem][22] ? (d.css({
                        cursor: "pointer"
                    }), d.unbind("click").bind("click", function() {
                        g.options.lightbox || g.elemArray[g.curElem][22] ? g.goFullscreen() : g.elemArray[g.curElem][5] && (g.elemArray[g.curElem][6] ? window.open(g.elemArray[g.curElem][5], g.elemArray[g.curElem][6]) : window.open(g.elemArray[g.curElem][5]))
                    })) : (d.css({
                            cursor: ""
                        }),
                        d.unbind("click"))
                }
            },
            showImage: function() {
                var a = b(".html5gallery-elem-" + this.id, this.isFullscreen ? this.$fullscreen : this.$gallery);
                $preloading = "" === a.html() ? b("<div class='html5gallery-loading-center-" + this.id + "'></div>").appendTo(a) : b("<div class='html5gallery-loading-" + this.id + "'></div>").appendTo(a);
                var d = this,
                    c = new Image;
                b(c).load(function() {
                    $preloading.remove();
                    d.elemArray[d.curElem][10] = this.width;
                    d.elemArray[d.curElem][11] = this.height;
                    var c;
                    if (d.isFullscreen) {
                        var e = d.elemArray[d.curElem][17] ?
                            Math.min(d.elemArray[d.curElem][17], d.fullscreenWidth) : d.fullscreenWidth;
                        c = d.elemArray[d.curElem][18] ? Math.min(d.elemArray[d.curElem][18], d.fullscreenHeight) : d.fullscreenHeight;
                        c = Math.min(e / this.width, c / this.height);
                        c = 1 < c ? 1 : c
                    } else c = "fill" == d.options.resizemode ? Math.max(d.options.width / this.width, d.options.height / this.height) : Math.min(d.options.width / this.width, d.options.height / this.height);
                    e = Math.round(c * this.width);
                    c = Math.round(c * this.height);
                    var h = d.isFullscreen ? e : d.options.width,
                        j = d.isFullscreen ?
                        c : d.options.height,
                        g = Math.round(h / 2 - e / 2),
                        k = Math.round(j / 2 - c / 2);
                    d.isFullscreen && d.adjustFullscreen(h, j);
                    a.css({
                        width: h,
                        height: j
                    });
                    e = b("<div class='html5gallery-elem-img-" + d.id + "' style='display:block; position:absolute; overflow:hidden; width:" + h + "px; height:" + j + "px; left:0px; margin-left:" + (d.options.slideshadow && !d.isFullscreen ? 4 : 0) + "px; top:0px; margin-top:" + (d.options.slideshadow && !d.isFullscreen ? 4 : 0) + "px;'><img class='html5gallery-elem-image-" + d.id + "' style='border:none; position:absolute; opacity:inherit; filter:inherit; padding:0px; margin:0px; left:" +
                        g + "px; top:" + k + "px; max-width:none; max-height:none; width:" + e + "px; height:" + c + "px;' src='" + d.elemArray[d.curElem][2] + "' />" + d.options.watermarkcode + "</div>");
                    c = b(".html5gallery-elem-img-" + d.id, a);
                    c.length ? (a.prepend(e), a.html5boxTransition(d.id, c, e, {
                        effect: d.options.effect,
                        easing: d.options.easing,
                        duration: d.options.duration,
                        direction: d.curElem >= d.savedElem,
                        slide: d.options.slide
                    }, function() {})) : a.html(e);
                    d.options.googleanalyticsaccount && window._gaq && window._gaq.push(["_trackEvent", "Image", "Play",
                        d.elemArray[d.curElem][2]
                    ])
                });
                b(c).error(function() {
                    $preloading.remove();
                    d.isFullscreen && d.adjustFullscreen(d.options.width, d.options.height);
                    a.html("<div class='html5gallery-elem-error-" + d.id + "' style='display:block; position:absolute; overflow:hidden; text-align:center; width:" + d.options.width + "px; left:0px; top:" + Math.round(d.options.height / 2 - 10) + "px; margin:4px;'><div class='html5gallery-error-" + d.id + "'>The requested content cannot be found</div>");
                    d.options.googleanalyticsaccount && window._gaq &&
                        window._gaq.push(["_trackEvent", "Image", "Error", d.elemArray[d.curElem][2]])
                });
                c.src = this.elemArray[this.curElem][2]
            },
            adjustFullscreen: function(a, d, c) {
                var e = this.options.isMobile ? Math.max(b(window).width(), b(document).width()) : b(window).width();

                this.fullscreenWidth = e - 2 * this.fullscreenMargin - 2 * this.fullscreenOutsideMargin;
                var f = window.innerHeight ? window.innerHeight : b(window).height();
                this.fullscreenHeight = f - 2 * this.fullscreenMargin - this.fullscreenBarH - 2 * this.fullscreenOutsideMargin;
                var h = Math.max(f,
                        b(document).height()),
                    j = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : this.fullscreenWidth,
                    g = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : this.fullscreenHeight,
                    j = Math.min(j / a, g / d);
                1 > j && (a *= j, d *= j);
                f = b(window).scrollTop() + Math.round((f - (d + 2 * this.fullscreenMargin + this.fullscreenBarH)) / 2);
                b(".html5gallery-fullscreen-" + this.id).css({
                    width: e + "px",
                    height: h + "px"
                });
                b(".html5gallery-fullscreen-title-" + this.id,
                    this.$fullscreen).css({
                    width: a - 2 * this.fullscreenMargin - 72
                });
                c ? (b(".html5gallery-fullscreen-box-" + this.id, this.$fullscreen).css({
                    width: a + 2 * this.fullscreenMargin,
                    height: d + 2 * this.fullscreenMargin + this.fullscreenBarH,
                    top: f
                }), b(".html5gallery-fullscreen-elem-" + this.id, this.$fullscreen).css({
                    width: a + 2 * this.fullscreenMargin,
                    height: d + 2 * this.fullscreenMargin
                }), b(".html5gallery-fullscreen-elem-wrapper-" + this.id, this.$fullscreen).css({
                    width: a,
                    height: d
                }), b(".html5gallery-fullscreen-bar-" + this.id, this.$fullscreen).css({
                    width: a +
                        2 * this.fullscreenMargin
                })) : (b(".html5gallery-fullscreen-box-" + this.id, this.$fullscreen).animate({
                    width: a + 2 * this.fullscreenMargin,
                    height: d + 2 * this.fullscreenMargin + this.fullscreenBarH,
                    top: f
                }, "slow"), b(".html5gallery-fullscreen-elem-" + this.id, this.$fullscreen).animate({
                    width: a + 2 * this.fullscreenMargin,
                    height: d + 2 * this.fullscreenMargin
                }, "slow"), b(".html5gallery-fullscreen-elem-wrapper-" + this.id, this.$fullscreen).animate({
                    width: a,
                    height: d
                }, "slow"), b(".html5gallery-fullscreen-bar-" + this.id, this.$fullscreen).animate({
                    width: a +
                        2 * this.fullscreenMargin
                }, "slow"));
                b(".html5gallery-fullscreen-next-" + this.id, this.$fullscreen).css({
                    top: Math.round(d / 2)
                });
                b(".html5gallery-fullscreen-prev-" + this.id, this.$fullscreen).css({
                    top: Math.round(d / 2)
                });
                b(".html5gallery-fullscreen-play-" + this.id, this.$fullscreen).css("display", this.isPaused && 1 < this.elemArray.length && 1 == this.elemArray[this.curElem][9] ? "block" : "none");
                b(".html5gallery-fullscreen-pause-" + this.id, this.$fullscreen).css("display", this.isPaused || 1 >= this.elemArray.length || 1 != this.elemArray[this.curElem][9] ?
                    "none" : "block");
                b(".html5gallery-elem-" + this.id, this.$fullscreen).css({
                    height: d
                });
                b(".html5gallery-fullscreen-timer-" + this.id, this.$fullscreen).css({
                    top: String(d - 4) + "px"
                });
                b(".html5gallery-elem-video-" + this.id, this.$fullscreen).css({
                    width: a + "px",
                    height: d + "px"
                });
                b(".html5gallery-elem-video-container-" + this.id, this.$fullscreen).css({
                    width: a + "px",
                    height: d + "px"
                });
                c = this.options.isIPhone ? d - 48 : d;
                b(".html5gallery-elem-video-container-" + this.id, this.$fullscreen).find("video").css({
                    width: a + "px",
                    height: c +
                        "px"
                });
                b("#html5gallery-elem-video-" + this.id, this.$fullscreen).css({
                    width: a + "px",
                    height: d + "px"
                });
                b("#html5gallery-elem-video-" + this.id, this.$fullscreen).attr("width", a);
                b("#html5gallery-elem-video-" + this.id, this.$fullscreen).attr("height", d);
                b(".html5gallery-elem-video-" + this.id, this.$fullscreen).find("iframe").attr("width", a);
                b(".html5gallery-elem-video-" + this.id, this.$fullscreen).find("iframe").attr("height", d);
                b("#html5gallery-elem-video-" + this.id, this.$fullscreen).find("iframe").attr("width",
                    a);
                b("#html5gallery-elem-video-" + this.id, this.$fullscreen).find("iframe").attr("height", d)
            },
            showPoster: function() {
                var a = this.isFullscreen ? this.$fullscreen : this.$gallery,
                    d = b(".html5gallery-elem-" + this.id, a);
                $preloading = "" === d.html() ? b("<div class='html5gallery-loading-center-" + this.id + "'></div>").appendTo(d) : b("<div class='html5gallery-loading-" + this.id + "'></div>").appendTo(d);
                var c = this,
                    e = this.elemArray[this.curElem][10],
                    f = this.elemArray[this.curElem][11],
                    h = new Image;
                b(h).load(function() {
                    $preloading.remove();
                    var h, g, k;
                    c.isFullscreen ? (g = c.elemArray[c.curElem][17] ? Math.min(c.elemArray[c.curElem][17], c.fullscreenWidth) : Math.min(e, c.fullscreenWidth), k = c.elemArray[c.curElem][18] ? Math.min(c.elemArray[c.curElem][18], c.fullscreenHeight) : Math.min(f, c.fullscreenHeight), h = Math.max(g / this.width, k / this.height), h = 1 < h ? 1 : h) : (h = "fill" == c.options.resizemode ? Math.max(c.options.width / this.width, c.options.height / this.height) : Math.min(c.options.width / this.width, c.options.height / this.height), g = c.options.width, k = c.options.height);
                    var n = Math.round(h * this.width);
                    h = Math.round(h * this.height);
                    var p = Math.round(g / 2 - n / 2),
                        r = Math.round(k / 2 - h / 2);
                    c.isFullscreen && c.adjustFullscreen(g, k);
                    d.css({
                        width: g,
                        height: k
                    });
                    g = b("<div class='html5gallery-elem-img-" + c.id + "' style='display:block; position:absolute; overflow:hidden; width:" + g + "px; height:" + k + "px; left:0px; margin-left:" + (c.options.slideshadow && !c.isFullscreen ? 4 : 0) + "px; top:0px; margin-top:" + (c.options.slideshadow && !c.isFullscreen ? 4 : 0) + "px;'><img class='html5gallery-elem-image-" + c.id +
                        "' style='border:none; position:absolute; opacity:inherit; filter:inherit; padding:0px; margin:0px; left:" + p + "px; top:" + r + "px; max-width:none; max-height:none; width:" + n + "px; height:" + h + "px;' src='" + c.elemArray[c.curElem][12] + "' />" + c.options.watermarkcode + "</div>");
                    k = b(".html5gallery-elem-img-" + c.id, d);
                    k.length ? (d.prepend(g), d.html5boxTransition(c.id, k, g, {
                            effect: c.options.effect,
                            easing: c.options.easing,
                            duration: c.options.duration,
                            direction: c.curElem >= c.savedElem,
                            slide: c.options.slide
                        }, function() {})) :
                        d.html(g);
                    b(".html5gallery-video-play-" + c.id, a).length || b("<div class='html5gallery-video-play-" + c.id + "' style='position:absolute;display:block;cursor:pointer;top:50%;left:50%;width:64px;height:64px;margin-left:-32px;margin-top:-32px;background:url(\"" + c.options.skinfolder + "playvideo_64.png\") no-repeat center center;'></div>").appendTo(d).unbind(c.eClick).bind(c.eClick, function() {
                        b(this).remove();
                        clearTimeout(c.slideshowTimeout);
                        b(".html5gallery-timer-" + c.id, c.$gallery).css({
                            width: 0
                        });
                        clearInterval(c.slideTimer);
                        c.slideTimerCount = 0;
                        c.showingPoster = !1;
                        var a = c.elemArray[c.curElem][9];
                        5 == a || 6 == a || 7 == a || 8 == a ? c.showVideo(!0) : 9 == a ? c.showYoutube(!0) : 10 == a ? c.showVimeo(!0) : 11 == a && c.showEmbedVideo(!0)
                    })
                });
                b(h).error(function() {
                    $preloading.remove();
                    c.isFullscreen && c.adjustFullscreen(c.options.width, c.options.height);
                    d.html("<div class='html5gallery-elem-error-" + c.id + "' style='display:block; position:absolute; overflow:hidden; text-align:center; width:" + c.options.width + "px; left:0px; top:" + Math.round(c.options.height /
                        2 - 10) + "px; margin:4px;'><div class='html5gallery-error-" + c.id + "'>The requested content cannot be found</div>");
                    c.options.googleanalyticsaccount && window._gaq && window._gaq.push(["_trackEvent", "Image", "Error", c.elemArray[c.curElem][12]])
                });
                h.src = this.elemArray[this.curElem][12]
            },
            showVideo: function(a, d) {
                this.disableTouchSwipe = !0;
                var c = this.isFullscreen ? this.$fullscreen : this.$gallery,
                    e = this.elemArray[this.curElem][10],
                    f = this.elemArray[this.curElem][11];
                if (this.isFullscreen) {
                    var e = this.elemArray[this.curElem][17] ?
                        Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : Math.min(e, this.fullscreenWidth),
                        h = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : Math.min(f, this.fullscreenHeight);
                    this.adjustFullscreen(e, h);
                    f = e;
                    e = h
                } else b(".html5gallery-elem-" + this.id, this.$gallery).css({
                    height: this.options.height
                }), f = this.options.width, e = this.options.height;
                h = -1;
                d && b(".html5gallery-elem-" + this.id, c).find("video").length && (h = b(".html5gallery-elem-" +
                    this.id, c).find("video:first").get(0).currentTime);
                b(".html5gallery-elem-" + this.id, c).html("<div class='html5gallery-loading-center-" + this.id + "'></div><div class='html5gallery-elem-video-" + this.id + "' style='display:block;position:absolute;overflow:hidden;top:" + (this.options.slideshadow && !this.isFullscreen ? 4 : 0) + "px; bleft:" + (this.options.slideshadow && !this.isFullscreen ? 4 : 0) + "px;width:" + f + "px;height:" + e + "px;'></div>" + this.options.watermarkcode);
                this.isHTML5 = !1;
                if (this.options.isIE678 || this.options.isIE9 &&
                    this.options.useflashonie9 || this.options.isIE10 && this.options.useflashonie10 || this.options.isIE11 && this.options.useflashonie11) this.isHTML5 = !1;
                else if (this.options.isMobile) this.isHTML5 = !0;
                else if ((this.options.html5player || !this.options.flashInstalled) && this.options.html5VideoSupported)
                    if (!this.options.isFirefox && !this.options.isOpera || (this.options.isFirefox || this.options.isOpera) && (this.elemArray[this.curElem][3] || this.elemArray[this.curElem][4])) this.isHTML5 = !0;
                if (this.isHTML5) {
                    var j = this.elemArray[this.curElem][2],
                        g = this.elemArray[this.curElem][13];
                    if (this.options.isFirefox || this.options.isOpera || !j) j = this.elemArray[this.curElem][4] ? this.elemArray[this.curElem][4] : this.elemArray[this.curElem][3], g = this.elemArray[this.curElem][15] ? this.elemArray[this.curElem][15] : this.elemArray[this.curElem][14];
                    this.embedHTML5Video(b(".html5gallery-elem-video-" + this.id, c), f, e, j, g, a, h, d)
                } else h = this.elemArray[this.curElem][2], "/" != h.charAt(0) && ("http:" != h.substring(0, 5) && "https:" != h.substring(0, 6)) && (h = this.options.htmlfolder +
                    h), j = "", this.elemArray[this.curElem][13] && (j = this.elemArray[this.curElem][13], "/" != j.charAt(0) && ("http:" != j.substring(0, 5) && "https:" != j.substring(0, 6)) && (j = this.options.htmlfolder + j)), this.embedFlash(b(".html5gallery-elem-video-" + this.id, c), "100%", "100%", this.options.jsfolder + "html5boxplayer.swf", "transparent", {
                    width: f,
                    height: e,
                    hidecontrols: this.options.videohidecontrols ? "1" : "0",
                    hideplaybutton: "0",
                    videofile: h,
                    hdfile: j,
                    ishd: this.isHd ? "1" : "0",
                    autoplay: a ? "1" : "0",
                    errorcss: ".html5box-error" + this.options.errorcss,
                    id: this.id
                });
                this.options.googleanalyticsaccount && window._gaq && window._gaq.push(["_trackEvent", "Video", "Play", this.elemArray[this.curElem][2]])
            },
            showSWF: function() {
                var a = this.isFullscreen ? this.$fullscreen : this.$gallery,
                    d = this.elemArray[this.curElem][10],
                    c = this.elemArray[this.curElem][11];
                this.isFullscreen ? this.adjustFullscreen(d, c) : b(".html5gallery-elem-" + this.id, this.$gallery).css({
                    width: this.options.width,
                    height: this.options.height
                });
                var e = this.isFullscreen ? 0 : Math.round((this.options.height - c) /
                        2) + (this.options.slideshadow ? 4 : 0),
                    f = this.isFullscreen ? 0 : Math.round((this.options.width - d) / 2) + (this.options.slideshadow ? 4 : 0);
                b(".html5gallery-elem-" + this.id, a).html("<div class='html5gallery-elem-flash-" + this.id + "' style='display:block;position:absolute;overflow:hidden;top:" + e + "px;left:-120px;width:" + d + "px;height:" + c + "px;'></div>" + this.options.watermarkcode);
                this.embedFlash(b(".html5gallery-elem-flash-" + this.id, a), d, c, this.elemArray[this.curElem][2], "window", {});
                this.options.googleanalyticsaccount &&
                    window._gaq && window._gaq.push(["_trackEvent", "Flash", "Play", this.elemArray[this.curElem][2]])
            },
            prepareYoutubeHref: function(a) {
                var b = a.match(/(\?v=|\/\d\/|\/embed\/|\/v\/|\.be\/)([a-zA-Z0-9\-\_]+)/)[2],
                    b = ("https:" == document.location.protocol ? "https:" : "http:") + "//www.youtube.com/embed/" + b;
                a = this.getYoutubeParams(a);
                var c = !0,
                    e;
                for (e in a) c ? (b += "?", c = !1) : b += "&", b += e + "=" + a[e];
                return b
            },
            getYoutubeParams: function(a) {
                var b = {};
                if (0 > a.indexOf("?")) return b;
                a = a.substring(a.indexOf("?") + 1).split("&");
                for (var c =
                        0; c < a.length; c++) {
                    var e = a[c].split("=");
                    e && (2 == e.length && "v" != e[0].toLowerCase()) && (b[e[0].toLowerCase()] = e[1])
                }
                return b
            },
            initYoutubeApi: function() {
                var a, b = !1,
                    c = !1;
                for (a = 0; a < this.elemArray.length; a++) 9 == this.elemArray[a][9] ? b = !0 : 10 == this.elemArray[a][9] && (c = !0);
                b && (a = document.createElement("script"), a.src = ("https:" == document.location.protocol ? "https" : "http") + "://www.youtube.com/iframe_api", b = document.getElementsByTagName("script")[0], b.parentNode.insertBefore(a, b));
                c && (a = document.createElement("script"),
                    a.src = this.options.jsfolder + "froogaloop2.min.js", b = document.getElementsByTagName("script")[0], b.parentNode.insertBefore(a, b))
            },
            showEmbedVideo: function(a) {
                var d = this.isFullscreen ? this.$fullscreen : this.$gallery,
                    c = this.elemArray[this.curElem][10],
                    e = this.elemArray[this.curElem][11];
                if (this.isFullscreen) {
                    var c = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : Math.min(c, this.fullscreenWidth),
                        f = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18],
                            this.fullscreenHeight) : Math.min(e, this.fullscreenHeight);
                    this.adjustFullscreen(c, f);
                    e = c;
                    c = f
                } else b(".html5gallery-elem-" + this.id, this.$gallery).css({
                    height: this.options.height
                }), e = this.options.width, c = this.options.height;
                f = this.elemArray[this.curElem][2];
                b(".html5gallery-elem-" + this.id, d).html("<div class='html5gallery-loading-center-" + this.id + "'></div><div id='html5gallery-elem-video-" + this.id + "' style='display:block;position:absolute;overflow:hidden;top:" + (this.options.slideshadow &&
                    !this.isFullscreen ? 4 : 0) + "px;left:-120px;width:" + e + "px;height:" + c + "px;'></div>" + this.options.watermarkcode);
                if (f.match(/\:\/\/.*(dai\.ly)/i)) var h = f.match(/(dai\.ly\/)([a-zA-Z0-9\-\_]+)/)[2],
                    f = (f.match(/https\:\/\//i) ? "https" : "http") + "://www.dailymotion.com/embed/video/" + h;
                a && (f = 0 > f.indexOf("?") ? f + "?autoplay=1" : f + "&autoplay=1");
                b("#html5gallery-elem-video-" + this.id, d).html("<iframe width='" + e + "' height='" + c + "' src='" + f + "' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
                this.options.googleanalyticsaccount && window._gaq && window._gaq.push(["_trackEvent", "Video", "Play", this.elemArray[this.curElem][2]])
            },
            showYoutube: function(a) {
                var d = this.isFullscreen ? this.$fullscreen : this.$gallery,
                    c = this.elemArray[this.curElem][10],
                    e = this.elemArray[this.curElem][11];
                if (this.isFullscreen) {
                    var c = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : Math.min(c, this.fullscreenWidth),
                        f = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18],
                            this.fullscreenHeight) : Math.min(e, this.fullscreenHeight);
                    this.adjustFullscreen(c, f);
                    e = c;
                    c = f
                } else b(".html5gallery-elem-" + this.id, this.$gallery).css({
                    height: this.options.height
                }), e = this.options.width, c = this.options.height;
                f = this.elemArray[this.curElem][2];
                b(".html5gallery-elem-" + this.id, d).html("<div class='html5gallery-loading-center-" + this.id + "'></div><div id='html5gallery-elem-video-" + this.id + "' style='display:block;position:absolute;overflow:hidden;top:" + (this.options.slideshadow &&
                    !this.isFullscreen ? 4 : 0) + "px;left:-120px;width:" + e + "px;height:" + c + "px;'></div>" + this.options.watermarkcode);
                var h = this;
                if (!ASYouTubeIframeAPIReady && (ASYouTubeTimeout += 100, 3E3 > ASYouTubeTimeout)) {
                    setTimeout(function() {
                        h.showYoutube(a)
                    }, 100);
                    return
                }
                if (ASYouTubeIframeAPIReady && !this.options.isMobile && !this.options.isIE6 && !this.options.isIE7) {
                    d = this.elemArray[this.curElem][2].match(/(\?v=|\/\d\/|\/embed\/|\/v\/|\.be\/)([a-zA-Z0-9\-\_]+)/)[2];
                    f = null;
                    a && (f =
                        function(a) {
                            a.target.playVideo()
                        });
                    var j = this.getYoutubeParams(this.elemArray[this.curElem][2]),
                        j = b.extend({
                            html5: 1,
                            controls: h.options.videohidecontrols ? "0" : "1",
                            showinfo: h.options.videohidecontrols ? "0" : "1",
                            autoplay: a ? 1 : 0,
                            rel: 0,
                            wmode: "transparent"
                        }, j);
                    new YT.Player("html5gallery-elem-video-" + this.id, {
                        width: e,
                        height: c,
                        videoId: d,
                        playerVars: j,
                        events: {
                            onReady: f,
                            onStateChange: function(a) {
                                a.data == YT.PlayerState.ENDED && (h.onVideoEnd(), h.isPaused || h.slideRun(-1))
                            }
                        }
                    })
                } else f = this.prepareYoutubeHref(f), a && (f =
                    0 > f.indexOf("?") ? f + "?autoplay=1" : f + "&autoplay=1"), f = 0 > f.indexOf("?") ? f + "?wmode=transparent&rel=0" : f + "&wmode=transparent&rel=0", h.options.videohidecontrols && (f += "&controls=0&showinfo=0"), b("#html5gallery-elem-video-" + this.id, d).html("<iframe width='" + e + "' height='" + c + "' src='" + f + "' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
                this.options.googleanalyticsaccount && window._gaq && window._gaq.push(["_trackEvent", "Video", "Play", this.elemArray[this.curElem][2]])
            },
            showVimeo: function(a) {
                var d =
                    this;
                if ("function" !== typeof $f && (ASVimeoTimeout += 100, 3E3 > ASVimeoTimeout)) {
                    setTimeout(function() {
                        d.showVimeo(a)
                    }, 100);
                    return
                }
                var c = this.isFullscreen ? this.$fullscreen : this.$gallery,
                    e = this.elemArray[this.curElem][10],
                    f = this.elemArray[this.curElem][11];
                if (this.isFullscreen) {
                    var e = this.elemArray[this.curElem][17] ? Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : Math.min(e, this.fullscreenWidth),
                        h = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) :
                        Math.min(f, this.fullscreenHeight);
                    this.adjustFullscreen(e, h);
                    f = e;
                    e = h
                } else b(".html5gallery-elem-" + this.id, this.$gallery).css({
                    height: this.options.height
                }), f = this.options.width, e = this.options.height;
                h = this.elemArray[this.curElem][2];
                h = 0 > h.indexOf("?") ? h + "?" : h + "&";
                h = a && !this.options.isAndroid ? h + "autoplay=1" : h + "autoplay=0";
                h += "&api=1&player_id=html5gallery_vimeo_" + this.id;
                b(".html5gallery-elem-" + this.id, c).html("<div class='html5gallery-loading-center-" + this.id + "'></div><div class='html5gallery-elem-video-" +
                    this.id + "' style='display:block;position:absolute;overflow:hidden;top:" + (this.options.slideshadow && !this.isFullscreen ? 4 : 0) + "px;left:-120px;width:" + f + "px;height:" + e + "px;'></div>" + this.options.watermarkcode);
                b(".html5gallery-elem-video-" + this.id, c).html("<iframe id='html5gallery_vimeo_" + this.id + "' width='" + f + "' height='" + e + "' src='" + h + "' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
                if ("function" === typeof $f && a &&
                    !this.options.isAndroid) {
                    var c = b("#html5gallery_vimeo_" + this.id)[0],
                        j = $f(c),
                        d = this;
                    j.addEvent("ready", function() {
                        j.addEvent("finish", function() {
                            d.onVideoEnd();
                            d.isPaused || d.slideRun(-1)
                        })
                    })
                }
                this.options.googleanalyticsaccount && window._gaq && window._gaq.push(["_trackEvent", "Video", "Play", this.elemArray[this.curElem][2]])
            },
            showIframe: function() {
                var a = this.isFullscreen ? this.$fullscreen : this.$gallery,
                    d = this.elemArray[this.curElem][10],
                    c = this.elemArray[this.curElem][11];
                if (this.isFullscreen) {
                    var d = this.elemArray[this.curElem][17] ?
                        Math.min(this.elemArray[this.curElem][17], this.fullscreenWidth) : Math.min(d, this.fullscreenWidth),
                        e = this.elemArray[this.curElem][18] ? Math.min(this.elemArray[this.curElem][18], this.fullscreenHeight) : Math.min(c, this.fullscreenHeight);
                    this.adjustFullscreen(d, e);
                    c = d;
                    d = e
                } else b(".html5gallery-elem-" + this.id, this.$gallery).css({
                    height: this.options.height
                }), c = this.options.width, d = this.options.height;
                e = this.elemArray[this.curElem][2];
                b(".html5gallery-elem-" + this.id, a).html("<div class='html5gallery-loading-center-" +
                    this.id + "'></div><div class='html5gallery-elem-iframe-" + this.id + "' style='display:block;position:absolute;overflow:hidden;top:" + (this.options.slideshadow && !this.isFullscreen ? 4 : 0) + "px;left:-120px;width:" + c + "px;height:" + d + "px;'></div>" + this.options.watermarkcode);
                b(".html5gallery-elem-iframe-" + this.id, a).html("<iframe id='html5gallery-iframe-" + this.id + "' width='" + c + "' height='" + d + "' src='" + e + "' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
                this.options.googleanalyticsaccount && window._gaq && window._gaq.push(["_trackEvent", "Iframe", "Play", this.elemArray[this.curElem][2]])
            },
            checkType: function(a) {
                return !a ? -1 : a.match(/\.(jpg|gif|png|bmp|jpeg)(.*)?$/i) ? 1 : a.match(/[^\.]\.(swf)\s*$/i) ? 2 : a.match(/[^\.]\.(mp3)\s*$/i) ? 3 : a.match(/[^\.]\.(pdf)\s*$/i) ? 4 : a.match(/\.(flv)(.*)?$/i) ? 5 : a.match(/\.(mp4|m4v)(.*)?$/i) ? 6 : a.match(/\.(ogv|ogg)(.*)?$/i) ? 7 : a.match(/\.(webm)(.*)?$/i) ? 8 : a.match(/\:\/\/.*(youtube\.com)/i) || a.match(/\:\/\/.*(youtu\.be)/i) ? 9 : a.match(/\:\/\/.*(vimeo\.com)/i) ?
                    10 : a.match(/\:\/\/.*(dailymotion\.com)/i) || a.match(/\:\/\/.*(dai\.ly)/i) ? 11 : 1
            },
            onChange: function() {
                if (this.options.onchange && window[this.options.onchange] && "function" == typeof window[this.options.onchange]) window[this.options.onchange](this.elemArray[this.curElem].concat([this.id]))
            },
            onSlideshowOver: function() {
                if (this.options.onslideshowover && window[this.options.onslideshowover] && "function" == typeof window[this.options.onslideshowover]) window[this.options.onslideshowover](this.elemArray[this.curElem])
            },
            onThumbOver: function() {
                if (this.options.onthumbover && window[this.options.onthumbover] && "function" == typeof window[this.options.onthumbover]) window[this.options.onthumbover](this.elemArray[this.curElem])
            },
            onThumbClick: function(a) {
                if (this.options.onthumbclick && window[this.options.onthumbclick] && "function" == typeof window[this.options.onthumbclick]) window[this.options.onthumbclick](this.elemArray[a].concat([this.id]));
                this.options.thumbjumptotop && (this.options.thumbjumpanchor && 0 < this.options.thumbjumpanchor.length &&
                    0 < b("#" + this.options.thumbjumpanchor).length ? (a = b("#" + this.options.thumbjumpanchor).offset().top, b(window).scrollTop(a)) : 0 <= this.options.thumbjumpposition ? b(window).scrollTop(this.options.thumbjumpposition) : (a = this.container.offset().top, a < b(window).scrollTop() && b(window).scrollTop(a)))
            },
            onVideoEnd: function() {
                if (this.options.onvideoend && window[this.options.onvideoend] && "function" == typeof window[this.options.onvideoend]) window[this.options.onvideoend](this.elemArray[this.curElem])
            },
            embedHTML5Video: function(a,
                d, c, e, f, h, j, g) {
                a.html("<div class='html5gallery-elem-video-container-" + this.id + "' style='position:relative;display:block;background-color:#000;width:" + d + "px;height:" + c + "px;'><video width='" + d + "px' height='" + c + "px'" + (this.options.nativehtml5controls && !this.options.videohidecontrols ? " controls" : "") + "></div>");
                b("video", a).get(0).setAttribute("src", (f && this.isHd ? f : e) + (0 < j ? "#t=" + j : ""));
                !this.options.nativehtml5controls && !this.options.videohidecontrols && (b("video", a).data("src", e), b("video", a).data("hd",
                    f), b("video", a).data("ishd", this.isHd), b("video", a).addHTML5VideoControls(this.options.skinfolder, this));
                (h || g) && b("video", a).get(0).play();
                var k = this;
                b("video", a).unbind("ended").bind("ended", function() {
                    k.onVideoEnd();
                    k.isPaused || k.slideRun(-1)
                })
            },
            embedFlash: function(a, d, c, e, f, h) {
                if (this.options.flashInstalled) {
                    var j = {
                        pluginspage: "http://www.adobe.com/go/getflashplayer",
                        quality: "high",
                        allowFullScreen: "true",
                        allowScriptAccess: "always",
                        type: "application/x-shockwave-flash"
                    };
                    j.width = d;
                    j.height = c;
                    j.src =
                        e;
                    j.wmode = f;
                    j.flashVars = b.param(h);
                    d = "";
                    for (var g in j) d += g + "=" + j[g] + " ";
                    a.html("<embed " + d + "/>")
                } else a.html("<div class='html5gallery-elem-error-" + this.id + "' style='display:block; position:absolute; text-align:center; width:" + this.options.width + "px; left:0px; top:" + Math.round(this.options.height / 2 - 10) + "px;'><div class='html5gallery-error-" + this.id + "'><div>The required Adobe Flash Player plugin is not installed</div><div style='display:block;position:relative;text-align:center;width:112px;height:33px;margin:0px auto;'><a href='http://www.adobe.com/go/getflashplayer'><img src='http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' width='112' height='33'></img></a></div></div>")
            }
        };
        this.each(function() {
            var a = b(this);
            k = k || {};
            for (var d in k) d.toLowerCase() !== d && (k[d.toLowerCase()] = k[d], delete k[d]);
            if ((!b(this).data("donotinit") || k && k.forceinit) && !b(this).data("inited")) {
                b(this).data("inited", 1);
                this.options = b.extend({}, k);
                var c = this;
                b.each(a.data(), function(a, b) {
                    c.options[a.toLowerCase()] = b
                });
                "skin" in this.options && (this.options.skin = this.options.skin.toLowerCase());
                d = {
                    skinfolder: "skins/horizontal/",
                    padding: 6,
                    bgcolor: "#ffffff",
                    bgimage: "",
                    galleryshadow: !0,
                    slideshadow: !1,
                    showsocialmedia: !1,
                    headerpos: "top",
                    showdescription: !0,
                    titleoverlay: !0,
                    titleautohide: !0,
                    titlecss: " {color:#ffffff; font-size:14px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; text-align:left; padding:10px 0px 10px 10px; background:rgb(102, 102, 102) transparent; background: rgba(102, 102, 102, 0.6); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                    titlecsslink: " a {color:#ffffff;}",
                    descriptioncss: " {color:#ffffff; font-size:13px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; text-align:left; padding:0px 0px 10px 10px; background:rgb(102, 102, 102) transparent; background: rgba(102, 102, 102, 0.6); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                    descriptioncsslink: " a {color:#ffffff;}",
                    showcarousel: !0,
                    carouselmargin: 0,
                    carouselbgtransparent: !1,
                    carouselbgcolorstart: "#494f54",
                    carouselbgcolorend: "#292c31",
                    carouseltopborder: "#666666",
                    carouselbottomborder: "#111111",
                    thumbwidth: 64,
                    thumbheight: 48,
                    thumbgap: 4,
                    thumbmargin: 6,
                    thumbunselectedimagebordercolor: "#ffffff",
                    thumbimageborder: 1,
                    thumbimagebordercolor: "",
                    thumbshowplayonvideo: !0,
                    thumbshadow: !1,
                    thumbopacity: 0.8
                };
                var l = {
                        padding: 12,
                        skinfolder: "skins/light/",
                        bgcolor: "",
                        bgimage: "",
                        galleryshadow: !1,
                        slideshadow: !0,
                        showsocialmedia: !1,
                        headerpos: "top",
                        showdescription: !0,
                        titleoverlay: !0,
                        titleautohide: !0,
                        titlecss: " {color:#ffffff; font-size:14px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background: rgba(256, 0, 0, 1); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                        titlecsslink: " a {color:#ffffff;}",
                        descriptioncss: " {color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background: rgba(102, 102, 102, 0.6); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                        descriptioncsslink: " a {color:#ffffff;}",
                        showcarousel: !0,
                        carouselmargin: 10,
                        carouselbgtransparent: !0,
                        thumbwidth: 48,
                        thumbheight: 48,
                        thumbgap: 8,
                        thumbmargin: 12,
                        thumbunselectedimagebordercolor: "#fff",
                        thumbimageborder: 2,
                        thumbimagebordercolor: "#fff",
                        thumbshowplayonvideo: !0,
                        thumbshadow: !0,
                        thumbopacity: 0.8
                    },
                    f = {
                        padding: 0,
                        skinfolder: "skins/mediapage/",
                        bgcolor: "",
                        bgimage: "",
                        galleryshadow: !1,
                        slideshadow: !1,
                        showsocialmedia: !1,
                        headerpos: "top",
                        showdescription: !0,
                        titleoverlay: !0,
                        titleautohide: !0,
                        titlecss: " {color:#ffffff; font-size:14px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background: rgba(51, 51, 153, 1); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                        titlecsslink: " a {color:#ffffff;}",
                        descriptioncss: " {color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background: rgba(102, 102, 102, 0.6); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                        descriptioncsslink: " a {color:#ffffff;}",
                        showcarousel: !0,
                        carouselmargin: 24,
                        carouselmultirows: !0,
                        thumbrowgap: 16,
                        carouselbgtransparent: !0,
                        thumbwidth: 340,
                        thumbheight: 200,
                        thumbgap: 10,
                        thumbmargin: 12,
                        thumbunselectedimagebordercolor: "#fff",
                        thumbimageborder: 0,
                        thumbimagebordercolor: "#fff",
                        thumbshowplayonvideo: !0,
                        thumbshadow: !1,
                        thumbopacity: 0.9,
                        thumbjumptotop: !0,
                        thumbshowtitle: !0,
                        thumbtitlecss: "{text-align:center; color:#000; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden;}",
                        thumbtitleheight: 24
                    },
                    h = {
                        padding: 12,
                        skinfolder: "skins/gallery/",
                        bgcolor: "",
                        bgimage: "",
                        galleryshadow: !1,
                        slideshadow: !0,
                        showsocialmedia: !1,
                        headerpos: "top",
                        showdescription: !0,
                        titleoverlay: !0,
                        titleautohide: !0,
                        titlecss: " {color:#ffffff; font-size:14px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background: rgba(102, 102, 102, 0.6); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                        titlecsslink: " a {color:#ffffff;}",
                        descriptioncss: " {color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 10px;  background:rgb(102, 102, 102) transparent; background: rgba(102, 102, 102, 0.6); filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; -ms-filter:'progid:DXImageTransform.Microsoft.gradient(startColorstr=#99666666, endColorstr=#99666666)'; }",
                        descriptioncsslink: " a {color:#ffffff;}",
                        showcarousel: !0,
                        carouselmargin: 10,
                        carouselbgtransparent: !0,
                        thumbwidth: 120,
                        thumbheight: 60,
                        thumbgap: 8,
                        thumbmargin: 12,
                        thumbunselectedimagebordercolor: "#fff",
                        thumbimageborder: 2,
                        thumbimagebordercolor: "#fff",
                        thumbshowplayonvideo: !0,
                        thumbshadow: !0,
                        thumbopacity: 0.8,
                        thumbshowtitle: !0,
                        thumbtitlecss: "{text-align:center; color:#000; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:nowrap;}",
                        thumbtitleheight: 18
                    },
                    j = {
                        padding: 12,
                        skinfolder: "skins/gallery/",
                        bgcolor: "",
                        bgimage: "",
                        galleryshadow: !1,
                        slideshadow: !0,
                        showsocialmedia: !1,
                        headerpos: "bottom",
                        showdescription: !0,
                        titleoverlay: !1,
                        titleheight: 72,
                        titleautohide: !0,
                        titlecss: "{color:#333;font-size:14px;font-family:Arial,Helvetica,sans-serif;overflow:hidden;text-align:center;padding:16px 8px 4px 8px;}",
                        titlecsslink: "a{color:#333;}",
                        descriptioncss: "{color:#333;font-size:12px;font-family:Arial,Helvetica,sans-serif;overflow:hidden;text-align:center;padding:4px 8px; }",
                        descriptioncsslink: "a{color:#333;}",
                        showcarousel: !0,
                        carouselmargin: 10,
                        carouselbgtransparent: !0,
                        thumbwidth: 120,
                        thumbheight: 60,
                        thumbgap: 8,
                        thumbmargin: 12,
                        thumbunselectedimagebordercolor: "#fff",
                        thumbimageborder: 2,
                        thumbimagebordercolor: "#fff",
                        thumbshowplayonvideo: !0,
                        thumbshadow: !0,
                        thumbopacity: 0.8,
                        thumbshowtitle: !1,
                        thumbtitlecss: "{text-align:center; color:#000; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:nowrap;}",
                        thumbtitleheight: 18
                    },
                    g = {
                        skinfolder: "skins/darkness/",
                        padding: 12,
                        bgcolor: "#444444",
                        bgimage: "background.jpg",
                        galleryshadow: !1,
                        slideshadow: !1,
                        headerpos: "bottom",
                        showdescription: !1,
                        titleoverlay: !1,
                        titleautohide: !1,
                        titlecss: " {color:#ffffff; font-size:16px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px;}",
                        titlecsslink: " a {color:#ffffff;}",
                        descriptioncss: " {color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 0px;}",
                        descriptioncsslink: " a {color:#ffffff;}",
                        showcarousel: !0,
                        carouselmargin: 8,
                        carouselbgtransparent: !1,
                        carouselbgcolorstart: "#494f54",
                        carouselbgcolorend: "#292c31",
                        carouseltopborder: "#666666",
                        carouselbottomborder: "#111111",
                        thumbwidth: 64,
                        thumbheight: 48,
                        thumbgap: 4,
                        thumbmargin: 6,
                        thumbunselectedimagebordercolor: "#ffffff",
                        thumbimageborder: 1,
                        thumbimagebordercolor: "",
                        thumbshowplayonvideo: !0,
                        thumbshadow: !1,
                        thumbopacity: 0.8
                    },
                    n = {
                        skinfolder: "skins/vertical/",
                        padding: 12,
                        bgcolor: "#444444",
                        bgimage: "background.jpg",
                        galleryshadow: !1,
                        slideshadow: !1,
                        headerpos: "bottom",
                        showdescription: !1,
                        titleoverlay: !1,
                        titleautohide: !1,
                        titlecss: " {color:#ffffff; font-size:16px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px;}",
                        titlecsslink: " a {color:#ffffff;}",
                        descriptioncss: " {color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 0px;}",
                        descriptioncsslink: " a {color:#ffffff;}",
                        showcarousel: !0,
                        carouselmargin: 8,
                        carouselposition: "right",
                        carouselbgtransparent: !1,
                        carouselbgcolorstart: "#494f54",
                        carouselbgcolorend: "#292c31",
                        carouseltopborder: "#666666",
                        carouselbottomborder: "#111111",
                        carouselhighlightbgcolorstart: "#999999",
                        carouselhighlightbgcolorend: "#666666",
                        carouselhighlighttopborder: "#cccccc",
                        carouselhighlightbottomborder: "#444444",
                        carouselhighlightbgimage: "",
                        thumbwidth: 148,
                        thumbheight: 48,
                        thumbgap: 2,
                        thumbmargin: 6,
                        thumbunselectedimagebordercolor: "",
                        thumbimageborder: 1,
                        thumbimagebordercolor: "#cccccc",
                        thumbshowplayonvideo: !0,
                        thumbshadow: !1,
                        thumbopacity: 0.8,
                        thumbshowimage: !0,
                        thumbshowtitle: !0,
                        thumbtitlecss: "{text-align:center; color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:nowrap;}"
                    },
                    p = {
                        skinfolder: "skins/showcase/",
                        padding: 12,
                        bgcolor: "#444444",
                        bgimage: "background.jpg",
                        galleryshadow: !1,
                        slideshadow: !1,
                        showsocialmedia: !1,
                        headerpos: "bottom",
                        showdescription: !1,
                        titleoverlay: !1,
                        titleautohide: !1,
                        titlecss: " {color:#ffffff; font-size:16px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:10px 0px;}",
                        titlecsslink: " a {color:#ffffff;}",
                        descriptioncss: " {color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; text-align:left; padding:0px 0px 10px 0px;}",
                        descriptioncsslink: " a {color:#ffffff;}",
                        showcarousel: !0,
                        carouselmargin: 8,
                        carouselposition: "bottom",
                        carouselheight: 210,
                        carouselbgtransparent: !1,
                        carouselbgcolorstart: "#494f54",
                        carouselbgcolorend: "#292c31",
                        carouseltopborder: "#666666",
                        carouselbottomborder: "#111111",
                        carouselhighlightbgcolorstart: "#999999",
                        carouselhighlightbgcolorend: "#666666",
                        carouselhighlighttopborder: "#cccccc",
                        carouselhighlightbottomborder: "#444444",
                        carouselhighlightbgimage: "",
                        thumbwidth: 148,
                        thumbheight: 60,
                        thumbgap: 2,
                        thumbmargin: 6,
                        thumbunselectedimagebordercolor: "",
                        thumbimageborder: 1,
                        thumbimagebordercolor: "#cccccc",
                        thumbshowplayonvideo: !0,
                        thumbshadow: !1,
                        thumbopacity: 0.8,
                        thumbshowimage: !0,
                        thumbshowtitle: !0,
                        thumbtitlecss: "{text-align:left; color:#ffffff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; padding: 6px 0;}",
                        thumbshowdescription: !0,
                        thumbdescriptioncss: "{font-size:10px;}"
                    },
                    q = {
                        freelink: "http://html5box.com/html5gallery/watermark.php",
                        watermark: "",
                        watermarklink: "",
                        skin: "horizontal",
                        googlefonts: "",
                        enabletouchswipe: !0,
                        enabletouchswipeonandroid: !0,
                        responsive: !1,
                        responsivefullscreen: !1,
                        screenquery: {},
                        src: "",
                        xml: "",
                        xmlnocache: !0,
                        lightbox: !1,
                        autoslide: !1,
                        slideshowinterval: 6E3,
                        random: !1,
                        borderradius: 0,
                        loop: 0,
                        notupdatecarousel: !1,
                        updatecarouselinterval: 6E4,
                        autoplayvideo: !1,
                        html5player: !0,
                        playvideoonclick: !0,
                        videohidecontrols: !1,
                        nativehtml5controls: !1,
                        hddefault: !1,
                        useflashonie9: !0,
                        useflashonie10: !1,
                        useflashonie11: !1,
                        lightboxborder: 8,
                        lightboxtextheight: 72,
                        lightboxmargin: 12,
                        lightboxbgcolor: "#fff",
                        lightboxshowtitle: !0,
                        lightboxtitlecss: " {color:#333333; font:bold 12px Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; line-height:18px;}",
                        lightboxtitlelinkcss: " a {color:#333333;}",
                        lightboxshowdescription: !0,
                        lightboxdescriptioncss: " {color:#333333; font:normal 12px Arial,Helvetica,sans-serif; overflow:hidden; white-space:normal; line-height:14px;}",
                        lightboxdescriptionlinkcss: " a {color:#333333;}",
                        effect: "fade",
                        easing: "easeOutCubic",
                        duration: 1500,
                        slide: {
                            duration: 1E3,
                            easing: "easeOutExpo"
                        },
                        width: 480,
                        height: 270,
                        showtimer: !0,
                        resizemode: "fit",
                        showtitle: !0,
                        titleheight: 45,
                        errorcss: " {text-align:center; color:#ff0000; font-size:14px; font-family:Arial, sans-serif;}",
                        shownumbering: !1,
                        numberingformat: "%NUM / %TOTAL",
                        googleanalyticsaccount: "",
                        showsocialmedia: !1,
                        socialheight: 30,
                        socialurlforeach: !1,
                        showfacebooklike: !0,
                        facebooklikeurl: "",
                        showtwitter: !0,
                        twitterurl: "",
                        twitterusername: "",
                        twittervia: "html5box",
                        showgoogleplus: !0,
                        googleplusurl: "",
                        showimagetoolbox: "always",
                        imagetoolboxstyle: "side",
                        imagetoolboxmode: "mouseover",
                        showplaybutton: !0,
                        showprevbutton: !0,
                        shownextbutton: !0,
                        showfullscreenbutton: !0,
                        carouselbgtransparent: !0,
                        carouselbgcolorstart: "#ffffff",
                        carouselbgcolorend: "#ffffff",
                        carouseltopborder: "#ffffff",
                        carouselbottomborder: "#ffffff",
                        carouselbgimage: "",
                        carouseleasing: "easeOutCirc",
                        carouselarrowwidth: 32,
                        carouselarrowheight: 32,
                        thumbresponsive: "samesize",
                        thumbcolumns: 5,
                        thumbcolumnsresponsive: !1,
                        thumbmediumcolumns: 3,
                        thumbmediumsize: 800,
                        thumbsmallcolumns: 2,
                        thumbsmallsize: 480,
                        carouselmultirows: !1,
                        thumbrowgap: 16,
                        thumblinkintitle: !1,
                        thumbjumptotop: !1,
                        thumbjumpposition: -1,
                        thumbjumpanchor: "",
                        youtubeapikey: "",
                        youtubeplaylistid: "",
                        youtubeplaylistmaxresults: "",
                        version: "3.6",
                        fv: !0,
                        fm: "72,84,77,76,53,32,71,97,108,108,101,114,121,32,70,114,101,101,32,86,101,114,115,105,111,110"
                    },
                    q = "vertical" == this.options.skin ? b.extend(q, n) : "showcase" == this.options.skin ? b.extend(q, p) : "light" ==
                    this.options.skin ? b.extend(q, l) : "gallery" == this.options.skin ? b.extend(q, h) : "gallerywithtext" == this.options.skin ? b.extend(q, j) : "horizontal" == this.options.skin ? b.extend(q, d) : "darkness" == this.options.skin ? b.extend(q, g) : "mediapage" == this.options.skin ? b.extend(q, f) : b.extend(q, d);
                this.options = b.extend(q, this.options);
                this.options.lightbox && (this.options.showfullscreenbutton = !1);
                "slideduration" in this.options && (this.options.slide.duration = this.options.slideduration);
                this.options.htmlfolder = window.location.href.substr(0,
                    window.location.href.lastIndexOf("/") + 1);
                if (!this.options.jsfolder || !this.options.jsfolder.length) this.options.jsfolder = r;
                "/" != this.options.skinfolder.charAt(0) && ("http:" != this.options.skinfolder.substring(0, 5) && "https:" != this.options.skinfolder.substring(0, 6)) && (this.options.skinfolder = this.options.jsfolder + this.options.skinfolder);
                l = "";
                f = this.options.fm.split(",");
                for (d = 0; d < f.length; d++) l += String.fromCharCode(f[d]);
                this.options.fvm = l;
                f = "hmtamgli5cboxh.iclolms";
                for (d = 1; 5 >= d; d++) f = f.slice(0, d) + f.slice(d +
                    1);
                l = f.length;
                for (d = 0; 5 > d; d++) f = f.slice(0, l - 9 + d) + f.slice(l - 8 + d); - 1 != this.options.htmlfolder.indexOf(f) && (this.options.fv = !1);
                l = b(window).width();
                if (this.options.screenquery)
                    for (d in this.options.screenquery) l <= this.options.screenquery[d].screenwidth && (this.options.screenquery[d].gallerywidth && (this.options.width = this.options.screenquery[d].gallerywidth), this.options.screenquery[d].galleryheight && (this.options.height = this.options.screenquery[d].galleryheight), this.options.screenquery[d].thumbwidth &&
                        (this.options.thumbwidth = this.options.screenquery[d].thumbwidth), this.options.screenquery[d].thumbheight && (this.options.thumbheight = this.options.screenquery[d].thumbheight));
                "galleryid" in this.options ? d = this.options.galleryid : (d = A, A++);
                l = new e(a, this.options, d);
                a.data("html5galleryobject", l);
                a.data("html5galleryid", d);
                html5GalleryObjects.addObject(l)
            }
        });
        return this
    };
    jQuery(document).ready(function() {
        jQuery(".html5gallery").html5gallery()
    })
}
var html5GalleryObjects = new function() {
    this.objects = [];
    this.addObject = function(r) {
        this.objects.push(r)
    };
    this.loadNext = function(r) {
        this.objects[r].onVideoEnd();
        this.objects[r].isPaused || this.objects[r].slideRun(-1)
    };
    this.setHd = function(r, t, p) {
        this.objects[r].setHd(t, p)
    };
    this.gotoSlide = function(r, t) {
        "undefined" === typeof t && (t = 0);
        this.objects[t] && this.objects[t].slideRun(r)
    }
};
if ("undefined" === typeof ASYouTubeIframeAPIReady) var ASYouTubeIframeAPIReady = !1,
    ASYouTubeTimeout = 0,
    onYouTubeIframeAPIReady = function() {
        ASYouTubeIframeAPIReady = !0
    };
var ASVimeoTimeout = 0;