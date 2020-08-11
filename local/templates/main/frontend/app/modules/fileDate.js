function FileDate (locals) {
    function get (path) {
        let fs = locals.requireNodeModule('fs');
        let fileStats = fs.statSync(path);

        return fileStats.mtime
    }

    return get;
}

module.exports = FileDate;