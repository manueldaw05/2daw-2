import { useState } from "react";
import "./App.css";

const initialContestants = [
{ id: 'c1', name: 'Laura', costume: 'Novia Cadáver', votes: 3, tags: ['Elegante',
'Maquillaje Pro'] },
{ id: 'c2', name: 'Marcos', costume: 'Zombi Sin WiFi', votes: 7, tags: ['Humor',
'Casero'] },
{ id: 'c3', name: 'Sergio', costume: 'Error 404', votes: 0, tags: ['Geek','Minimalista'] },

{ id: 'c4', name: 'Elena', costume: 'Bruja Cibernética', votes: 5, tags: ['LucesLED', 'Cyberpunk'] },
];


const [votes, setVotes] = useState(0);

export default function DisfracesData(){

function votar(){
    setVotes(votes+1);
}
    return(
        <>
            <div className="costume-app">
                <div className="contestant-grid">
                {initialContestants.map( d => 
                    <p>{d.name}</p>
                    <p>{d.costume}</p>
                    <p>{d.votes}</p>
                    {d.tags.map(tag=>
                        <p className="tags-list">
                            <span className="tag-pill">{tag}</span>
                        </p>
                    )}
                    <button className="vote-btn"  onclick={votar}>Votar</button>
                
                    <p>👑 Rey de laNoche</p>
                </div>
            )}
                </div>
            </div>
        </>
    )
}