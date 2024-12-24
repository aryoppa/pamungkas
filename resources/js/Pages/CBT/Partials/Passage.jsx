function UnsafeComponent({html}) {
    return <div dangerouslySetInnerHTML={
        {__html: html}
    }/>;
}
const Passages = ({title, passage}) => {
    const styles = {
        passageBox: {
            textAlign: "justify",
        }
    }

    return (
        <div className="col-lg-9 col-md-9 col-12 p-4" style={styles.passageBox}>
            <h1 className="text-2xl text-center font-bold mb-2">
                {title}
            </h1>
            <p>
                {passage}
            </p>
        </div>
    );
}

export default Passages
