# Ermöglicht es Alpine.js in den Contao Formularen zu verwenden.

In den Formularen und deren Felder können nun Alpine.js-Tags definiert werden und somit können die Formulare dynamisch gestaltet werden.
Im Seitenlayout muss das Template "js_alpine" aktiviert werden.

Im x-data Attribut des Formulars kann der Platzhalter **##model_object##** verwendet werden, um ein automatisch generiertes Objekt mit allen Feldern (x-model) und deren Standardwerten einzufügen.
