# A simple Makefile alternative to using Grunt for your static asset compilation

# Variables
RESOURCES=app/resources
APP_JS_SOURCES=$(RESOURCES)/js/global.js
AUTOPREFIXER_CONFIG="app/config/autoprefixer.json"

SASS=$(RESOURCES)/sass
JS==$(RESOURCES)/js

BIN=node_modules/.bin
DIST=web
DIST_CSS=$(DIST)/css/global.css
DIST_JS=$(DIST)/js/global.js

# Phony targets
.PHONY : all clean watch

# Compile the final targets
all: $(DIST_CSS) $(DIST_JS)

# Destroy the final targets
clean:
	rm -f $(DIST_CSS) $(DIST_JS)

# Watch the filesystem and recompile on file modification
watch:
	$(BIN)/wach -o "$(JS)/*,$(SASS)/**/*" make all

# The final CSS file
$(DIST_CSS): $(SASS)/**
	$(BIN)/node-sass $(SASS)/global.scss $(DIST_CSS)
	$(BIN)/postcss --use autoprefixer -c $(AUTOPREFIXER_CONFIG) -r $(DIST_CSS)

# The final JS file
$(DIST_JS): $(APP_JS_SOURCES)
	cat $(APP_JS_SOURCES) > $(DIST_JS)
