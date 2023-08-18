const fs = require("fs");


module.exports = {
    name: 'setup',
    description: 'Bot Setup',
    execute(bot, message, args, VARSET) {
      message.channel.send("This's Cpt Archer, Starfleet officer and captain of Enterprise NX-01, welcome to the bridge!");
      if(!message.member.hasPermission("ADMINISTRATOR")) return message.channel.send("- Error: No you can't access bot's setup!",{code : "diff"});

      if((args[0] == undefined)) return message.channel.send("Usage: setup [moverole][bot-cmd][prison][adminrole][prefix-setup]",{code : "css"});

      if(args[0] == "moverole"){

        if((args[1] == undefined)) return message.channel.send("Usage: setup move [role]",{code : "css"});

        role = getRoleID(args[1]);

        if (message.guild.roles.get(role) == undefined){
          return message.channel.send("- Error: Couldn't find move role!",{code : "diff"});
        }

        fs.readFile('./bot_boss/config.json', 'utf8', function readFileCallback(err, data){
          if (err){
            console.log(err);
          } else {
            obj = JSON.parse(data);

            if (obj[VARSET.guildID].moveRole == role){return message.channel.send("- Error: Already exits!",{code : "diff"});}
            obj[VARSET.guildID].moveRole = role;
            json = JSON.stringify(obj);

            write(json);
          }
        });

      }

      if(args[0] == "bot-cmd"){
        if((args[1] == undefined)) return message.channel.send("Usage: setup bot-cmd-channel [text-channel]",{code : "css"});
        let botChannel = message.mentions.channels.first();

        botChannel = botChannel.id

        if (message.guild.channels.get(botChannel) == undefined){
          return message.channel.send("- Error: Couldn't find move role!",{code : "diff"});
        }

        fs.readFile('./bot_boss/config.json', 'utf8', function readFileCallback(err, data){
          if (err){
            console.log(err);
          } else {
            obj = JSON.parse(data); //now it an object

            if (obj[VARSET.guildID].botCmd == botChannel){return message.channel.send("- Error: Already exits!",{code : "diff"});}
            obj[VARSET.guildID].botCmd = botChannel; //add some data
            json = JSON.stringify(obj); //convert it back to json

            write(json);
          }
        });

      }

      if(args[0] == "prefix-setup"){
        if((args[1] == undefined)) return message.channel.send("Usage: setup prefix-setp [special char]",{code : "css"});
        let sPrefix = args[1];

        fs.readFile('./bot_boss/config.json', 'utf8', function readFileCallback(err, data){
          if (err){
            console.log(err);
          } else {
            obj = JSON.parse(data); //now it an object
            if (obj[VARSET.guildID].prefix == sPrefix){return message.channel.send("- Error: Already exits!",{code : "diff"});}
            obj[VARSET.guildID].prefix = sPrefix; //add some data
            json = JSON.stringify(obj); //convert it back to json

            write(json);
          }
        });

      }

      if(args[0] == "adminrole"){
        if((args[1] == undefined)) return message.channel.send("Usage: setup admin [role]",{code : "css"});
        let role = getRoleID(args[1]);

        if (message.guild.roles.get(role) == undefined){
          return message.channel.send("- Error: Couldn't find admin role!",{code : "diff"});
        }

        fs.readFile('./bot_boss/config.json', 'utf8', function readFileCallback(err, data){
          if (err){
            console.log(err);
          } else {
            obj = JSON.parse(data); //now it an object
            if (obj[VARSET.guildID].adminRole == role){return message.channel.send("- Error: Already exits!",{code : "diff"});}
            obj[VARSET.guildID].adminRole = role; //add some data
            json = JSON.stringify(obj); //convert it back to json

            write(json);

          }
        });
      }

      if(args[0] == "modrole"){
        if((args[1] == undefined)) return message.channel.send("Usage: setup moderator [role]",{code : "css"});
        let role = getRoleID(args[1]);

        if (message.guild.roles.get(role) == undefined){
          return message.channel.send("- Error: Couldn't find mod role!",{code : "diff"});
        }

        fs.readFile('./bot_boss/config.json', 'utf8', function readFileCallback(err, data){
          if (err){
            console.log(err);
          } else {
            obj = JSON.parse(data); //now it an object
            if (obj[VARSET.guildID].modRole == role){return message.channel.send("- Error: Already exits!",{code : "diff"});}
            obj[VARSET.guildID].modRole = role; //add some data
            json = JSON.stringify(obj); //convert it back to json

            write(json);
          }
        });

      }

      if(args[0] == "prison"){
        if((args[1] == undefined)) return message.channel.send("Usage: setup prison [channel]",{code : "css"});
          let pChannel = message.guild.channels.find(channel => channel.name == args[1]);
          pChannelID = pChannel.id;

        fs.readFile('./bot_boss/config.json', 'utf8', function readFileCallback(err, data){
          if (err){
            console.log(err);
          } else {
            obj = JSON.parse(data); //now it an object
            if (obj[VARSET.guildID].prisonChannel == pChannelID){return message.channel.send("- Error: Already exits!",{code : "diff"});}
            obj[VARSET.guildID].prisonChannel = pChannelID; //add some data
            json = JSON.stringify(obj); //convert it back to json

            write(json);
          }
        });

      }

      return;

      function write(json){
        fs.writeFile('./bot_boss/config.json', json, 'utf8' , (err) => {
          if (err) throw err;
          message.channel.send("CptArcher: updated!",{code : "css"});
          console.log('The file has been saved and updated with new info!');
          delete require.cache[require.resolve('../bot_boss/config.json')];
        }); // write it back
      }

    },
};


function getRoleID(x){
  x = x.slice(3,-1);
  return x;
}
