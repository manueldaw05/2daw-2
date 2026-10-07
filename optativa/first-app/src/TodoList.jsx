const person = {
    name: 'Gregorio Y. Zara',
    theme: {
        backgroundColor: 'black',
        color: 'pink'
    },
    url: {
        baseUrl: 'https://i.imgur.com/',
        imageId: '7vQD0fP',
        imageSize: 's' 
    }
};

export default function TodoList() {

    return (
    <div style={ person.theme }>
        <h1>{ person.name }'s Todos</h1>
        <img
        className="avatar"
        src={ person.url.baseUrl + person.url.imageId + person.url.imageSize + '.jpg' }
        alt="Gregorio Y. Zara"
        />
        <ul>
            <li>Improve the videophone</li>
            <li>Prepare aeronautics lectures</li>
            <li>Work on the alcohol-fuelled engine</li>
        </ul>
    </div>
    );
}