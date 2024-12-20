(function(t, i) {
    t = t || {};
    var a = function(t, i) {
        return this.initialize(t, i)
    };
    a.defaults = {
        speed: 1.5,
        horizontalPosition: "50%",
        offset: 0,
        parallaxHeight: "180%"
    }, a.prototype = {
        initialize: function(t, i) {
            return t.data("__parallax") ? this : (this.$el = t, this.setData().setOptions(i).build(), this)
        },
        setData: function() {
            return this.$el.data("__parallax", this), this
        },
        setOptions: function(t) {
            return this.options = i.extend(!0, {}, a.defaults, t, {
                wrapper: this.$el
            }), this
        },
        build: function() {
            var t, a, o, s = this,
                n = i(window);
            (o = i('<div class="parallax-background"></div>')).css({
                "background-image": "url(" + s.options.wrapper.data("image-src") + ")",
                "background-size": "cover",
                position: "absolute",
                top: 0,
                left: 0,
                width: "100%",
                height: s.options.parallaxHeight
            }), s.options.wrapper.prepend(o), s.options.wrapper.css({
                position: "relative",
                overflow: "hidden"
            });
            return n.on("scroll resize", function() {
                t = s.options.wrapper.offset(), a = -(n.scrollTop() - (t.top - 100)) / (s.options.speed + 2), plxPos = a < 0 ? Math.abs(a) : -Math.abs(a), o.css({
                    transform: "translate3d(0, " + (plxPos - 50 + s.options.offset) + "px, 0)",
                    "background-position-x": s.options.horizontalPosition
                })
            }), n.trigger("scroll"), this
        }
    }, i.extend(t, {
        PluginParallax: a
    }), i.fn.themePluginParallax = function(t) {
        return this.map(function() {
            var o = i(this);
            return o.data("__parallax") ? o.data("__parallax") : new a(o, t)
        })
    }
}).apply(this, [window.theme, jQuery]);
